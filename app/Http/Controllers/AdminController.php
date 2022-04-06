<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\ProdCategory;
use App\Models\Services;
use App\Models\Staffs;
use App\Models\Users;
use App\Models\Tips;
use App\Models\TipCategory;
use App\Models\Contact;
use App\Models\Orders;

class AdminController extends Controller
{   

    //Auth Login 
    public function AuthLogin(){
        $Admin_ID = Session::get('AccAdmin_ID');
        if($Admin_ID){
            return redirect('admin/dashboards');
        } else {
            return redirect('admin/login')->send();
        }
    }

    //login
    public function getLoginAdmin(){
        return view('Spa.Admin.login');
    }

    public function postLoginAdmin(Request $request){
       $this->validate($request, 
       [
            'AdminName'=>'required|min:3',
            'Password'=>'required|min:3|max:32'
       ],
       [
            'AdminName.required'=>'Bạn chưa nhập tên đăng nhập !',
            'AdminName.min'=>'Tên đăng nhập phải dài hơn 3 ký tự !',
            'Password.required'=>'Bạn chưa nhập mật khẩu !',
            'Password.min'=>'Mật khẩu của bạn phải dài hơn 3 ký tự !',
            'Password.max'=>'Mật khẩu của bạn không được quá 32 ký tự !'
       ]);

       $adminname = $request->AdminName;
       $password = $request->Password;
       //->join('profile_admin', 'account_admin.AccAdmin_ID', 'profile_admin.AccAdmin_ID')
        $AccountLogin = DB::table('account_admin')->where('AdminName', $adminname)->where('Password', $password)->first();
        if($AccountLogin) {
            Session::put('AdminName', $AccountLogin->AdminName);
            Session::put('AccAdmin_ID', $AccountLogin->AccAdmin_ID);
            return redirect('admin/dashboards');
        }
        else {
            return redirect('admin/login')->with('alert', 'Bạn điền sai tên đăng nhập hoặc mật khẩu !');
        }

    }
    // Đăng Xuất Admin
    public function logout(){
        Session::put('AdminName', null);
        Session::put('AccAdmin_ID', null);
        return redirect('eluvspa/login');
    }
    //dashboards
    public function dashboards(){
        $this->AuthLogin();
        $tips = DB::table('tips')->orderBy('Tips_View', 'DESC')->take(5)->get();
        $Products = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')
        ->orderBy('Prod_View', 'DESC')->take(5)
        ->get();
        $total_users = DB::table('account_users')->count();
        $total_prod = DB::table('products')->count();
        $total_service = DB::table('service')->count();
        return view('Spa.Admin.dashboards', ['tips'=>$tips, 'Products'=>$Products, 'total_users'=>$total_users,
        'total_prod'=>$total_prod, 'total_service'=>$total_service
        ]);
    }

    //profile admin
    public function getprofileAdmin(){ 
        $this->AuthLogin();
        $profileAdmin = DB::table('profile_admin')->join('account_admin', 'profile_admin.AccAdmin_ID', 'account_admin.AccAdmin_ID')->select('profile_admin.*', 'account_admin.AdminName', 'account_admin.Email')->where('account_admin.AccAdmin_ID', Session::get('AccAdmin_ID'))->first();
       //dd($profileAdmin);
        return view('Spa.Admin.profile', ['profileAdmin'=>$profileAdmin]);
    }

    //Prod DB
    public function productsAdmin(){
        $this->AuthLogin();
        $Products = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->get();
        return view ('Spa.Admin.productDB', ['Products'=>$Products]);
    }
    // Add Prod
    public function getAddProd(){
        $this->AuthLogin();
        $Products = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->get();
        $Prod_Cate = DB::table('products_category')->get();
        return view ('Spa.Admin.AddProd', ['Products'=>$Products], ['Prod_Cate' => $Prod_Cate]);
    }
    public function postAddProd(Request $request){

        $this->validate($request, 
        [
            'ProdName'=>'required|min:3|unique:products,ProdName',
            'Slug'=>'required|min:3|unique:products,Slug_prod',
            'Category_ID'=>'required',
            'Status'=>'required',
            'ProdPrice'=>'required',
            'ProdCompany'=>'required',
            'NSX'=>'required',
            'HSD'=>'required'
        ], 
        [
            'ProdName.required'=>'Bạn chưa nhập tên sản phẩm !',
            'ProdName.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự !',
            'ProdName.unique'=>'Sản phẩm đã tồn tại !',
            'Slug.required'=>'Bạn chưa nhập Slug !',
            'Slug.min'=>'Slug phải có ít nhất 3 ký tự !',
            'Slug.unique'=>'Slug đã tồn tại !',
            'Category_ID.required'=>'Bạn chưa chọn loại sản phẩm !',
            'Status.required'=>'Bạn chưa nhập số lượng !',
            'ProdPrice.required'=>'Bạn chưa nhập giá sản phẩm',
            'ProdCompany.required'=>'Bạn chưa nhập tên của Nhà Sản Xuất !',
            'NSX.required'=>'Bạn chưa chọn ngày sản xuất !',
            'HSD.required'=>'Bạn chưa chọn hạn sử dụng'
            
        ]);
        
        $Products = new Products;
        $Products->ProdName = $request->ProdName;
        $Products->Slug_prod = $request->Slug;
        $Products->Category_ID = $request->Category_ID;
        $Products->Prod_img = $request->Prod_img;
        $Products->ProdDecript = $request->ProdDecript;
        $Products->Status = $request->Status;
        $Products->ProdPrice = $request->ProdPrice;
        $Products->ProdCompany = $request->ProdCompany;
        $Products->NSX = $request->NSX;
        $Products->HSD = $request->HSD;
        
        if($request->hasFile('Prod_img')){
            $file = $request->file('Prod_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/product".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/product", $images);
            $Products->Prod_img = $images;
        }

        $Products->save();

        return redirect('admin/products')->with('alert', 'Đã thêm sản phẩm thành công !');
    }
    // Edit Prod
    public function getEditProd($Prod_ID){
        $this->AuthLogin();
        $Products = Products::find($Prod_ID);
        $Prod_Cate = DB::table('products_category')->get();
        return view ('Spa.Admin.editProd', ['Products'=>$Products, 'Prod_Cate' => $Prod_Cate]);
    }
    public function postEditProd(Request $request, $Prod_ID){
        $Products = Products::find($Prod_ID);
        $this->validate($request, 
        [
            'ProdName'=>'required|min:3',
            'Slug'=>'required|min:3|unique:products,Slug_prod',
            'Category_ID'=>'required',
            'Status'=>'required',
            'ProdPrice'=>'required',
            'ProdCompany'=>'required',
            'NSX'=>'required',
            'HSD'=>'required'
        ], 
        [
            'ProdName.required'=>'Bạn chưa nhập tên sản phẩm !',
            'ProdName.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự !',
            'Slug.required'=>'Bạn chưa nhập Slug !',
            'Slug.min'=>'Slug phải có ít nhất 3 ký tự !',
            'Category_ID.required'=>'Bạn chưa chọn loại sản phẩm !',
            'Status.required'=>'Bạn chưa nhập số lượng !',
            'ProdPrice.required'=>'Bạn chưa nhập giá sản phẩm',
            'ProdCompany.required'=>'Bạn chưa nhập tên của Nhà Sản Xuất !',
            'NSX.required'=>'Bạn chưa chọn ngày sản xuất !',
            'HSD.required'=>'Bạn chưa chọn hạn sử dụng'
            
        ]);
        
        $Products->ProdName = $request->ProdName;
        $Products->Slug_prod = $request->Slug;
        $Products->Category_ID = $request->Category_ID;
        $Products->Prod_img = $request->Prod_img;
        $Products->ProdDecript = $request->ProdDecript;
        $Products->Status = $request->Status;
        $Products->ProdPrice = $request->ProdPrice;
        $Products->ProdCompany = $request->ProdCompany;
        $Products->NSX = $request->NSX;
        $Products->HSD = $request->HSD;
        
        if($request->hasFile('Prod_img')){
            $file = $request->file('Prod_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/product".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/product", $images);
            $Products->Prod_img = $images;
        }

        $Products->save();

        return redirect('admin/products')->with('alert', 'Cập nhật sản phẩm thành công !');
    }
    //Delete Prod
    public function getDelProd($Prod_ID){
        $Products = Products::find($Prod_ID);
        $Products->delete();

        return redirect('admin/products')->with('alert', 'Xóa sản phẩm thành công !');
    }
    
    // Prod Category
    public function prodCateAdmin(){
        $this->AuthLogin();
        $Prod_Cate = DB::table('products_category')->get();
        return view ('Spa.Admin.prodCate', ['Prod_Cate' => $Prod_Cate]);
    }
    // add prod cate
    public function getAddProdCate(){
        $this->AuthLogin();
        return view ('Spa.Admin.addProdCate');
    }
    public function postAddProdCate(Request $request){
        $this->validate($request, 
        [
            'CateName'=>'required|unique:products_category,CateName',
        ], 
        [
            'CateName.required'=>'Bạn chưa nhập loại sản phẩm !',
            'ProdName.unique'=>'Loại sản phẩm đã tồn tại !'
        ]);

        $ProdCate = new ProdCategory;

        $ProdCate->CateName = $request->CateName;
        $ProdCate->Slug_cateProd = $request->Slug_cate;
        $ProdCate->save();

        return redirect('admin/prodCate')->with('alert', 'Thêm loại sản phẩm thành công !');
    }
    // Edit Category Prod
    public function getEditProdCate($Category_ID){
        $this->AuthLogin();
        $Prod_Cate = ProdCategory::find($Category_ID);
        return view ('Spa.Admin.editProdCate', ['Prod_Cate' => $Prod_Cate]);
    }
    public function postEditProdCate(Request $request, $Category_ID){
        $Prod_Cate = ProdCategory::find($Category_ID);
        $this->validate($request, 
        [
            'CateName'=>'required|',
        ], 
        [
            'CateName.required'=>'Bạn chưa nhập loại sản phẩm !',
        ]);

        $Prod_Cate->CateName = $request->CateName;
        $Prod_Cate->Slug_cateProd = $request->Slug_cate;
        $Prod_Cate->save();

        return redirect('admin/prodCate')->with('alert', 'Sửa loại sản phẩm thành công !');
    }
    // Delete ProdCate
    public function getDelProdCate($Category_ID){
        $Prod_Cate = ProdCategory::find($Category_ID);
        $Prod_Cate->delete();

        return redirect('admin/prodCate')->with('alert', 'Xóa loại sản phẩm thành công !');
    }
    // Service DB
    public function servicesAdmin(){
        $this->AuthLogin();
        $Services = DB::table('service')->get();
        return view ('Spa.Admin.serviceDB', ['Services' => $Services]);
    }
    // Add Service
    public function getAddService(){
        $this->AuthLogin();
        return view ('Spa.Admin.addService');
    }
    public function postAddService(Request $request){
        $this->validate($request, 
        [
            'ServiceName'=>'required|unique:service,ServiceName',
            'Service_img'=>'required',
        ], 
        [
            'ServiceName.required'=>'Bạn chưa nhập tên dịch vụ !',
            'ServiceName.unique'=>'Dịch vụ đã tồn tại !',
            'Service_img.required'=>'Bạn chưa chọn hình ảnh !'
        ]);

        $Service = new Services;

        $Service->ServiceName = $request->ServiceName;
        $Service->Slug_service = $request->Slug_service;
        $Service->Service_img = $request->Service_img;
        $Service->SerContent = $request->SerContent;
        $Service->PriceOneTime = $request->PriceOneTime;
        $Service->AllInOne = $request->AllInOne;
        
        if($request->hasFile('Service_img')){
            $file = $request->file('Service_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/service-img".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/service-img", $images);
            $Service->Service_img = $images;
        }

        $Service->save();

        return redirect('admin/services')->with('alert', 'Thêm dịch vụ thành công !');
    }
    // Edit Service
    public function getEditService($Service_ID){
        $this->AuthLogin();
        $Service = Services::find($Service_ID);
        return view ('Spa.Admin.editService', ['Service' => $Service]);
    }
    public function postEditService(Request $request, $Service_ID){
        $Service = Services::find($Service_ID);
        $this->validate($request, 
        [
            'ServiceName'=>'required',
        ], 
        [
            'ServiceName.required'=>'Bạn chưa nhập tên dịch vụ !'
        ]);

        $Service->ServiceName = $request->ServiceName;
        $Service->Slug_service = $request->Slug_service;
        $Service->Service_img = $request->Service_img;
        $Service->SerContent = $request->SerContent;
        $Service->PriceOneTime = $request->PriceOneTime;
        $Service->AllInOne = $request->AllInOne;
        
        if($request->hasFile('Service_img')){
            $file = $request->file('Service_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/service-img".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/service-img", $images);
            $Service->Service_img = $images;
        }

        $Service->save();

        return redirect('admin/services')->with('alert', 'Sửa dịch vụ thành công !');
    }
    // Delete Service
    public function getDelService($Service_ID){
        $Service = Services::find($Service_ID);
        $Service->delete();

        return redirect('admin/services')->with('alert', 'Xóa dịch vụ thành công !');
    }
    //Staffs DB
    public function staffsAdmin(){
        $this->AuthLogin();
        $Staffs = DB::table('staffs')->get();
        return view('Spa.Admin.staffDB', ['Staffs'=>$Staffs]);
    }
    // Add Staff
    public function getAddStaff(){
        $this->AuthLogin();
        return view ('Spa.Admin.addStaff');
    }
    public function postAddStaff(Request $request){
        $this->validate($request, 
        [
            'FullName'=>'required',
            'Email'=>'required',
            'Birthday'=>'required',
            'Jobs'=>'required',
            'Address'=>'required',
            'Salary'=>'required',
            'StartingDate'=>'required'
        ], 
        [
            'FullName.required'=>'Bạn chưa nhập tên nhân viên !',
            'Email.required'=>'Bạn chưa nhập địa chỉ Email !',
            'Birthday.required'=>'Bạn chưa nhập ngày/tháng/năm sinh của nhân viên !',
            'Jobs.required'=>'Bạn chưa nhập vị trị công việc !',
            'Address.required'=>'Bạn chưa nhập địa chỉ !',
            'Salary.required'=>'Bạn chưa nhập lương/tháng của nhân viên !',
            'StartingDate.required'=>'Bạn chưa nhập ngày vào làm !'
        ]);

        $Staffs = new Staffs;

        $Staffs->FullName = $request->FullName;
        $Staffs->Email = $request->Email;
        $Staffs->Staff_img = $request->Staff_img;
        $Staffs->Birthday = $request->Birthday;
        $Staffs->Jobs = $request->Jobs;
        $Staffs->Address = $request->Address;
        $Staffs->Salary = $request->Salary;
        $Staffs->StartingDate = $request->StartingDate;
        
        if($request->hasFile('Staff_img')){
            $file = $request->file('Staff_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/staffs".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/staffs", $images);
            $Staffs->Staff_img = $images;
        }

        $Staffs->save();

        return redirect('admin/staffs')->with('alert', 'Thêm nhân viên thành công !');
    }
    //Edit Staffs
    public function getEditStaff($Staff_ID){
        $this->AuthLogin();
        $Staffs = Staffs::find($Staff_ID);
        return view ('Spa.Admin.editStaff', ['Staffs' => $Staffs]);
    }
    public function postEditStaff(Request $request, $Staff_ID){
        $Staffs = Staffs::find($Staff_ID);
        $this->validate($request, 
        [
            'FullName'=>'required',
            'Email'=>'required',
            'Birthday'=>'required',
            'Jobs'=>'required',
            'Address'=>'required',
            'Salary'=>'required',
            'StartingDate'=>'required'
        ], 
        [
            'FullName.required'=>'Bạn chưa nhập tên nhân viên !',
            'Email.required'=>'Bạn chưa nhập địa chỉ Email !',
            'Birthday.required'=>'Bạn chưa nhập ngày/tháng/năm sinh của nhân viên !',
            'Jobs.required'=>'Bạn chưa nhập vị trị công việc !',
            'Address.required'=>'Bạn chưa nhập địa chỉ !',
            'Salary.required'=>'Bạn chưa nhập lương/tháng của nhân viên !',
            'StartingDate.required'=>'Bạn chưa nhập ngày vào làm !'
        ]);

        $Staffs->FullName = $request->FullName;
        $Staffs->Email = $request->Email;
        $Staffs->Staff_img = $request->Staff_img;
        $Staffs->Birthday = $request->Birthday;
        $Staffs->Jobs = $request->Jobs;
        $Staffs->Address = $request->Address;
        $Staffs->Salary = $request->Salary;
        $Staffs->StartingDate = $request->StartingDate;
        
        if($request->hasFile('Staff_img')){
            $file = $request->file('Staff_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/staffs".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/staffs", $images);
            $Staffs->Staff_img = $images;
        }

        $Staffs->save();

        return redirect('admin/staffs')->with('alert', 'Sửa thông tin nhân viên thành công !');
    }
    // Delete Staffs
    public function getDelStaff($Staff_ID){
        $Staffs = Staffs::find($Staff_ID);
        $Staffs->delete();

        return redirect('admin/staffs')->with('alert', 'Xóa nhân viên thành công !');
    }
    //Users DB
    public function usersAdmin(){
        $this->AuthLogin();
        $Users = DB::table('account_users')->orderBy('User_ID', 'DESC')->get();
        return view('Spa.Admin.userDB', ['Users'=>$Users]);
    }
    //Edit User 
    public function getEditUser($User_ID){
        $this->AuthLogin();
        $Users = Users::find($User_ID);
        return view ('Spa.Admin.editUser', ['Users' => $Users]);
    }
    public function postEditUser(Request $request, $User_ID){
        $Users = Users::find($User_ID);
        $this->validate($request, 
        [
            'FirstName'=>'required',
            'LastName'=>'required',
            'Username'=>'required',
            'Email'=>'required',
            'Birthday'=>'required',
            'Address'=>'required',
            'City'=>'required',
            'Country'=>'required'
        ], 
        [
            'FirstName.required'=>'Bạn chưa nhập Họ !',
            'LastName.required'=>'Bạn chưa nhập Tên khách hàng !',
            'Username.required'=>'Bạn chưa nhập tên tài khoản',
            'Emai.required'=>'Bạn chưa nhập địa chỉ Email',
            'Birthday.required'=>'Bạn chưa nhập ngày/tháng/năm sinh của khách hàng !',
            'Address.required'=>'Bạn chưa nhập địa chỉ khách hàng!',
            'City.required'=>'Bạn chưa nhập tên Thành Phố !',
            'Country.required'=>'Bạn chưa nhập tên Quốc gia !'
        ]);

        $Users->FirstName = $request->FirstName;
        $Users->LastName = $request->LastName;
        $Users->Username = $request->Username;
        $Users->Email = $request->Email;
        $Users->User_img = $request->User_img;
        $Users->Birthday = $request->Birthday;
        $Users->Address = $request->Address;
        $Users->City = $request->City;
        $Users->Country = $request->Country;

        if($request->hasFile('User_img')){
            $file = $request->file('User_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/users".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/users", $images);
            $Users->User_img = $images;
        }

        $Users->save();

        return redirect('admin/users')->with('alert', 'Sửa thông tin khách hàng thành công !');
    }
    // Delete User
    public function getDelUser($User_ID){
        $Users = Users::find($User_ID);
        $Users->delete();

        return redirect('admin/users')->with('alert', 'Xóa khách hàng thành công !');
    }
    //Tips DB
    public function tipsAdmin(){
        $this->AuthLogin();
        $Tips = DB::table('tips')->join('tips_category', 'tips.TipsCategory_ID', 'tips_category.TipsCategory_ID')->get();
        return view ('Spa.Admin.tipDB', ['Tips'=>$Tips]);
    }
    //Add Tips
    public function getAddTip(){
        $this->AuthLogin();
        $Tips = DB::table('tips')->join('tips_category', 'tips.TipsCategory_ID', 'tips_category.TipsCategory_ID')->get();
        $tip_Cate = DB::table('tips_category')->get();
        return view ('Spa.Admin.addTip', ['Tips'=>$Tips], ['tip_Cate'=>$tip_Cate]);
    }
    public function postAddTip(Request $request){
        $this->validate($request, 
        [
            'TipsTitle'=>'required',
            'TipsCategory_ID'=>'required',
            'TipsContent'=>'required',
            'CreatedAt'=>'required'
        ], 
        [
            'TipsTitle.required'=>'Bạn chưa nhập tiêu đề !',
            'TipsCategory_ID.required'=>'Bạn chưa chọn loại tin tức !',
            'TipsContent.required'=>'Bạn chưa nhập nội dung !',
            'CreatedAt.required'=>'Bạn chưa nhập ngày đăng !'
        ]);

        $Tips = new Tips;

        $Tips->TipsTitle = $request->TipsTitle;
        $Tips->Slug_tips = $request->Slug_tips;
        $Tips->TipsCategory_ID = $request->TipsCategory_ID;
        $Tips->Tips_img = $request->Tips_img;
        $Tips->TipsContent = $request->TipsContent;
        $Tips->created_at = $request->CreatedAt;
        
        if($request->hasFile('Tips_img')){
            $file = $request->file('Tips_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/tips".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/tips", $images);
            $Tips->Tips_img = $images;
        }

        $Tips->save();

        return redirect('admin/tips')->with('alert', 'Thêm tin tức thành công !');
    }
    // Edit Tips
    public function getEditTip($Tip_ID){
        $this->AuthLogin();
        $Tips = Tips::find($Tip_ID);
        $tip_Cate = DB::table('tips_category')->get();

        return view ('Spa.Admin.editTip', ['Tips'=>$Tips, 'tip_Cate'=>$tip_Cate]);
    }
    public function postEditTip(Request $request, $Tip_ID){
        $Tips = Tips::find($Tip_ID);
        $this->validate($request, 
        [
            'TipsTitle'=>'required',
            'TipsCategory_ID'=>'required',
            'TipsContent'=>'required',
            'CreatedAt'=>'required'
        ], 
        [
            'TipsTitle.required'=>'Bạn chưa nhập tiêu đề !',
            'TipsCategory_ID.required'=>'Bạn chưa chọn loại tin tức !',
            'TipsContent.required'=>'Bạn chưa nhập nội dung !',
            'CreatedAt.required'=>'Bạn chưa nhập ngày đăng !'
        ]);

        $Tips->TipsTitle = $request->TipsTitle;
        $Tips->Slug_tips = $request->Slug_tips;
        $Tips->TipsCategory_ID = $request->TipsCategory_ID;
        $Tips->Tips_img = $request->Tips_img;
        $Tips->TipsContent = $request->TipsContent;
        $Tips->created_at = $request->CreatedAt;
        
        if($request->hasFile('Tips_img')){
            $file = $request->file('Tips_img');
            $name = $file->getClientOriginalName();
            $images = Str::random(4)."_".$name;
            while(file_exists("img/tips".$images)){
                $images = Str::random(4)."_".$name;
            }
            $file->move("img/tips", $images);
            $Tips->Tips_img = $images;
        }

        $Tips->save();

        return redirect('admin/tips')->with('alert', 'Sửa tin tức thành công !');
    }
    // Delete Tips
    public function getDelTip($Tip_ID){
        $Tips = Tips::find($Tip_ID);
        $Tips->delete();

        return view ('admin/tips')->with('alert', 'Xóa tin tức thành công !');
    }
    // TipCategory DB
    public function tipsCateAdmin(){
        $this->AuthLogin();
        $tip_Cate = DB::table('tips_category')->get();
        return view('Spa.Admin.tipCate', ['tip_Cate'=>$tip_Cate]);
    }
    // Add Tip Cate
    public function getAddTipCate(){
        $this->AuthLogin();
        return view('Spa.Admin.addTipCate');
    }
    public function postAddTipCate(Request $request){
        $this->validate($request, 
        [
            'TipsCateName'=>'required|unique:tips_category,TipsCateName',
        ], 
        [
            'TipsCateName.required'=>'Bạn chưa nhập loại tin tức !',
            'TipsName.unique'=>'Loại tin tức đã tồn tại !'
        ]);

        $tipCate = new TipCategory;

        $tipCate->TipsCateName = $request->TipsCateName;
        $tipCate->Slug_cateTips = $request->Slug_cateTips;
        $tipCate->save();

        return redirect('admin/tipCate')->with('alert', 'Thêm loại tin tức thành công !');
    }
    // Edit Tip cate
    public function getEditTipCate($TipCate_ID){
        $this->AuthLogin();
        $tipCate = TipCategory::find($TipCate_ID);
        return view ('Spa.Admin.editTipCate', ['tipCate'=>$tipCate]);
    }
    public function postEditTipCate(Request $request, $TipCate_ID){
        $tipCate = TipCategory::find($TipCate_ID);
        $this->validate($request, 
        [
            'TipsCateName'=>'required'
        ], 
        [
            'TipsCateName.required'=>'Bạn chưa nhập loại tin tức !'
        ]);

        $tipCate->TipsCateName = $request->TipsCateName;
        $tipCate->Slug_cateTips = $request->Slug_cateTips;
        $tipCate->save();

        return redirect('admin/tipCate')->with('alert', 'Sửa loại tin tức thành công !');
    }
    // Delete TIP CATE
    public function getDelTipCate($TipCate_ID){
        $tipCate = TipCategory::find($TipCate_ID);
        $tipCate->delete();

        return redirect('admin/tipCate')->with('alert', 'Xóa loại tin tức thành công !');
    }
    // Contact DB
    public function contactAdmin(){
        $contact = DB::table('contact')->get();
        return view('Spa.Admin.contact', ['contact'=>$contact]);
    }
    public function DelContact($Contact_ID){
        $contact = Contact::find($Contact_ID);
        $contact->delete();

        return redirect('admin/contacts')->with('alert', 'Xóa phản hồi của khách hàng thành công !');
    }
    // Order Prod
    public function orderProd(){
        $orders = DB::table('orders')->join('checkout', 'orders.Check_ID', 'checkout.Check_ID')->get();
        return view('Spa.Admin.orderProd', ['orders'=>$orders]);
    }
    // Xóa Order Prod
    public function DelOrderProd($Order_ID){
        $orders = Orders::find($Order_ID);
        $orders->delete();

        return redirect('admin/order-prod')->with('alert', 'Xóa đơn hàng thành công !');
    }
    // Booking 
    public function bookingService(){
        $booking = DB::table('booking')->join('service', 'booking.Service_ID', 'service.Service_ID')->get();
        return view('Spa.Admin.booking', ['booking'=>$booking]);
    }
    //calendar
    public function calendarAdmin(){
        $this->AuthLogin();
        return view('Spa.Admin.calendar');
    }

    //charts
    public function chartAdmin(){
        $this->AuthLogin();
        return view('Spa.Admin.chart');
    }
}
