<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Product;
use App\Wishlist;
class wishlistController extends Controller
{
    public function index()
    {
      $user_id = Auth::id();
      $product = Wishlist::with('users','products')->where('user_id',$user_id)->get();
      //return response()->json($product);
      return view('pages.wishlist',compact('product'));
    }
    public function AddWishlist($id)
    {
        

     	$userid=Auth::id();

    	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id' => $userid, 
    		'product_id'=>$id 
    	);

    	if (Auth::check()) {
    		if ($check) {
    			// return \Response::json(['error' => 'Product Already has on your wishlist']);
                return back()->with('warning','Product Already has on your wishlist!');         
                //return response()->json(['error' => 'Product Already has on your wishlist']);       
    		}else{
    			DB::table('wishlists')->insert($data);
             //   return \Response::json(['success' => 'Successfully Added on your wishlist']);
             return back()->with('success','Item created successfully!'); 
             //return response()->json(['success' => 'Successfully Added on your wishlist']);   		
    		}
    	}else{
    		//return \Response::json(['error' => 'At first login your account']);
            return back()->with('error','you are not logged in!');
              // return response()->json(['error' => 'At first login your account']);        
    	}

     }
     public function delete($id)
     {
        Wishlist::where('id',$id)->delete();
        return back()->with('error','successfully deleted');
     }
   }
