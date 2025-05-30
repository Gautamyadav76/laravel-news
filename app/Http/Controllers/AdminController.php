<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\session;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.index');
    }

    public function test(Request $request)
    {
        return Auth::user();
    }


    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $userExits = User::where("username", $request->input("username"))->where("password", $request->input("password"))->first();

        if ($userExits) {
            Auth::login($userExits);
            return redirect()->route('admin.categoryLists')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid username or password.');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('admin.loginForm')->with('success', 'Logout successful!');
    }






    //login//

    public function addCategoryForm()
    {
        return view('admin.add-category');
    }


    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name|min:3',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        if ($category->save()) {
            return redirect()->route('admin.categoryLists')->with('success', 'Category added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add category.');
        }
    }

    public function categoryLists()
    {
        $categories = Category::all();
        return view('admin.category', ['categories' => $categories]);
    }

    public function updateCategoryForm($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.update-category', ['category' => $category]);
    }

    public function updateCategory(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrfail($id);

        $category->name = $request->name;

        if ($category->save()) {
            return redirect()->route('admin.categoryLists')->with('success', 'Category Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update category.');
        }
    }

    public function deleteCategory($id)
    {

        $category = Category::findOrfail($id);
        if ($category->delete()) {
            return redirect()->route('admin.categoryLists')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back('admin.categoryLists')->with('error', 'Failed to delete Category');
        }
    }

    //post ///

    public function addpostForm()
    {
        $categories = Category::all();

        return view('admin.add-post', ['categories' => $categories]);
    }


    public function addpost(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string|min:5',
            'postdesc' => 'required|string|min:5',
            'fileToUpload' => 'required|mimes:jpg,jpeg,png|max:2048',
            'category' => 'required',
        ]);

        $image = $request->file('fileToUpload');
        $imageName = time() . '_post.' . $image->getClientOriginalExtension();
        $uploadPath = public_path('uploads/posts');

        $image->move($uploadPath, $imageName);

        $post = new Post();
        $post->title = $request->input('post_title');
        $post->description = $request->input('postdesc');
        $post->image = $imageName;
        $post->category = $request->input('category');



        if ($post->save()) {
            return redirect()->route('admin.postLists')->with('success', ' added post successfully!');
        } else {
            return redirect()->back('admin.postLists')->with('error', 'Failed to add post.');
        }
    }

    public function postLists()
    {
        $posts = post::with('catInfo')->get();
        return view('admin.post', ['posts' => $posts]);
    }




    public function updatepostForm($id)
    {
        $post = post::findOrFail($id);
        $categories = Category::all();
        // return $post;

        return view('admin.update-post', ['singlePost' => $post, 'categories' => $categories]);
    }


    public function updatepost(Request $request, $id)
    {

        $request->validate([
            'post_name' => 'required|string|min:5',

            'postdesc' => 'required|string|min:5',
            'image' => 'mimes:jpg,jpeg,png|max:1048',
            'category' => 'required',

        ]);



        $post = post::findOrfail($id);

        $post->title = $request->post_name;
        $post->description = $request->postdesc;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_post.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/posts');

            $image->move($uploadPath, $imageName);
            $post->image = $imageName;
        }
        $post->category = $request->category;


        if ($post->save()) {
            return redirect()->route('admin.postLists')->with('success', ' post Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update post.');
        }
    }


    public function deletepost($id)
    {

        $post = post::findOrfail($id);
        if ($post->delete()) {
            return redirect()->route('admin.postLists')->with('success', 'post deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete post');
        }
    }


    /////User/////


    public function addUserForm()

    {

        $users = User::all();

        return view('admin.add-user', ['users' => $users]);
    }

    public function adduser(Request $request)
    {

        $request->validate([

            'fname' => 'required|string|min:3',
            'lname' => 'required|string',
            'user' => 'required|string',
            'password' => 'required',
            'role' => 'required',

        ]);

        $User = new User();
        $User->frstname = $request->input('fname');
        $User->lstname = $request->input('lname');   //yaha right me db me jo name h wo aur left me html me jo name h//
        $User->username = $request->input('user');
        $User->role = $request->input('role');
        $User->password = $request->input('password');

        if ($User->save()) {
            return redirect()->route('admin.userlist')->with('success', 'User added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add user');
        }
    }

    public function userlist()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }


    public function updateUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.update-user', ['user' => $user]);
    }



    public function userupdate(Request $request, $id)
    {

        $request->validate([

            'f_name' => 'required|string|min:3',
            'l_name' => 'required|string',                 // isme jo name html code me h wo dena h//
            'username' => 'required|string',
            'password' => 'string|nullable',
            'role' => 'required',

        ]);


        $user = User::findOrFail($id);
        $user->frstname = $request->input('f_name');
        $user->lstname = $request->input('l_name');
        $user->username = $request->input('username');
        $user->role = $request->input('role');
        if ($request->has('password')) {
            $user->password = $request->input('password');
        }

        if ($user->save()) {
            return redirect()->route('admin.userlist')->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update user');
        }
    }


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return redirect()->route('admin.userlist')->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user');
        }
    }
};
