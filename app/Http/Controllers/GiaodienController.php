<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Session;
use App\Models\Contact;
use App\Models\CheckOut;
use Illuminate\Support\Facades\Redirect;
use Cart;

class GiaodienController extends Controller
{

    //Auth Login
    public function AuthLogin(){
        $User_ID = Session::get('User_ID');
        if($User_ID){
            return redirect('eluvspa');
        } else {
            return redirect('eluvspa/dang-nhap')->send();
        }
    }

    //Đăng ký
    public function getRegist(){
        return view ('Spa.Giaodien.register');
    }
    public function postRegist(Request $request){
        $this->validate($request,
        [
             'Username'=>'required|min:3|unique:account_users,Username',
             'Email'=>'required',
             'Password'=>'required|min:3|max:32'
        ],
        [
             'Username.required'=>'Bạn chưa nhập tên đăng nhập !',
             'Username.min'=>'Tên đăng nhập phải dài hơn 3 ký tự !',
             'Username.unique'=>'Tên đăng nhập đã tồn tại !',
             'Email.required'=>'Vui lòng nhập Email của bạn !',
             'Password.required'=>'Bạn chưa nhập mật khẩu !',
             'Password.min'=>'Mật khẩu của bạn phải dài hơn 3 ký tự !',
             'Password.max'=>'Mật khẩu của bạn không được quá 32 ký tự !'
        ]);

        $user = new Users;
        $user->Username = $request->Username;
        $user->Email = $request->Email;
        $user->Password = md5($request->Password);

        $user->save();

        return redirect('eluvspa/dang-ky')->with('alert', 'Tạo tài khoản thành công');
    }
    //Đăng nhập
    public function getLogin(){
        return view ('Spa.Giaodien.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,
        [
             'Username'=>'required|min:3',
             'Password'=>'required|min:3|max:32'
        ],
        [
             'Username.required'=>'Bạn chưa nhập tên đăng nhập !',
             'Username.min'=>'Tên đăng nhập phải dài hơn 3 ký tự !',
             'Password.required'=>'Bạn chưa nhập mật khẩu !',
             'Password.min'=>'Mật khẩu của bạn phải dài hơn 3 ký tự !',
             'Password.max'=>'Mật khẩu của bạn không được quá 32 ký tự !'
        ]);

        $username = $request->Username;
        $password = md5($request->Password);
        //->join('profile_admin', 'account_admin.AccAdmin_ID', 'profile_admin.AccAdmin_ID')
        $UserLogin = DB::table('account_users')->where('Username', $username)->where('Password', $password)->first();
        if($UserLogin) {
             Session::put('Username', $UserLogin->Username);
             Session::put('User_ID', $UserLogin->User_ID);

             return redirect('eluvspa');
        }
        else {
            return redirect('eluvspa/dang-nhap')->with('alert', 'Bạn điền sai tên đăng nhập hoặc mật khẩu !');
        }
    }
    // Đăng xuất
    public function Logout(){
        Session::put('Username', null);
        Session::put('User_ID', null);
        return redirect('eluvspa');
    }
    //Trang chủ
    public function index(){
        $users = DB::table('account_users')->first();
        $service = DB::table('service')->where('Service_View', '>=', 30)->get();
        $service_booking = DB::table('service')->get();
        $products = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('products.Prod_View', '>=', 50)->get();
        return view ('Spa.Giaodien.index', ['service'=>$service, 'products'=>$products, 'users'=>$users, 'service_booking'=>$service_booking]);
    }
    //Dịch vụ
    public function service(){
        $service = DB::table('service')->paginate(6);
        return view ('Spa.Giaodien.service', ['service'=>$service]);
    }
    //Sản phẩm
    public function product(){
        $products = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->paginate(9);
        return view ('Spa.Giaodien.allProd', ['products'=>$products]);
    }
    // sản phẩm - kem dưỡng da
    public function kemduongda(){
        $kemduongda = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('CateName','like', 'Kem Dưỡng Da')->paginate(9);
        return view ('Spa.Giaodien.kemddProd', ['kemduongda'=>$kemduongda]);
    }
    // sản phẩm - kem chống nắng
    public function kemchongnang(){
        $kemchongnang = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('CateName','like', 'Kem Chống Nắng')->paginate(9);
        return view ('Spa.Giaodien.kemcnProd', ['kemchongnang'=>$kemchongnang]);
    }
    // sản phẩm - Serum trị mụn
    public function serumtrimun(){
        $serumtrimun = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('CateName','like', 'Serum trị mụn')->paginate(9);
        return view ('Spa.Giaodien.serumProd', ['serumtrimun'=>$serumtrimun]);
    }
    // sản phẩm - Sữa rửa mặt
    public function suaruamat(){
        $suaruamat = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('CateName','like', 'Sửa rữa mặt')->paginate(9);
        return view ('Spa.Giaodien.suaruamat', ['suaruamat'=>$suaruamat]);
    }
    // sản phẩm - Nước Hoa
    public function nuochoa(){
        $nuochoa = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('CateName','like', 'Nước Hoa')->paginate(9);
        return view ('Spa.Giaodien.nuochoa', ['nuochoa'=>$nuochoa]);
    }
    //tips
    public function tips(){
        $tips = DB::table('tips')->join('tips_category', 'tips.TipsCategory_ID', 'tips_category.TipsCategory_ID')->paginate(9);
        return view ('Spa.Giaodien.tips', ['tips'=>$tips]);
    }
    //Liên hệ
    public function contact(){
        return view ('Spa.Giaodien.contact');
    }
    public function postContact(Request $request){
        $this->validate($request,
        [
            'FullName'=>'required',
            'Address'=>'required',
            'Email'=>'required',
            'SĐT'=>'required',
            'Content'=>'required'
        ],
        [
            'FullName.required'=>'Bạn chưa nhập Họ & Tên !',
            'Address.required'=>'Bạn chưa nhập địa chỉ !',
            'Email.required'=>'Bạn chưa nhập địa chỉ Email !',
            'SĐT.required'=>'Bạn chưa nhập Số điện thoại !',
            'Content.required'=>'Bạn chưa nhập nội dung !'
        ]);

        $Contact = new contact;

        $Contact->FullName = $request->FullName;
        $Contact->Email = $request->Email;
        $Contact->Address = $request->Address;
        $Contact->SĐT = $request->SĐT;
        $Contact->Content = $request->Content;

        $Contact->save();

        return redirect('eluvspa/lien-he')->with('alert', 'Bạn đã gửi phản hồi về cho Quản trị viên');
    }
    // Chi tiết sản phẩm
    public function prodDetail($Slug_prod){
        $prod_detail = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('Slug_prod', $Slug_prod)->first();

        $details = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('Slug_prod', $Slug_prod)->get();

        foreach($details as $key => $value){
            $Category_ID = $value->Category_ID;
        }

        $prod_related = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('products_category.Category_ID', $Category_ID)->whereNotIn('products.Slug_prod', [$Slug_prod])->get();
        return view ('Spa.Giaodien.prodDetail', ['prod_detail'=>$prod_detail, 'prod_related'=>$prod_related]);
    }
    // Giỏ Hàng
    public function cart(){
        return view ('Spa.Giaodien.cart');
    }
    // Thêm sp vào giỏ hàng
    public function saveCart(Request $request){
        $prodID = $request->prodID_hidden;
        $quantity = $request->quantity;

        $prod_info = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')->where('Prod_ID', $prodID)->first();

        $item['id'] = $prod_info->Prod_ID;
        $item['qty'] = $quantity;
        $item['name'] = $prod_info->ProdName;
        $item['price'] = $prod_info->ProdPrice;
        $item['weight'] = $prod_info->ProdPrice;
        $item['options']['image'] = $prod_info->Prod_img;
        $item['options']['brand'] = $prod_info->ProdCompany;
        $item['options']['status'] = $prod_info->Status;

        Cart::add($item);
        // Cart::destroy();

        return redirect ('eluvspa/gio-hang');
    }
    // Xóa sp khỏi giỏ hàng
    public function delCart($rowId){
        Cart::update($rowId, 0);
        return redirect ('eluvspa/gio-hang');
    }
    // Cập nhật giỏ hàng
    public function updateCart(Request $request){
        $rowId = $request->rowId_prod;
        $qty = $request->qty_cart;

        Cart::update($rowId, $qty);
        return redirect ('eluvspa/gio-hang');
    }
    // Search
    public function search(Request $request){
        $keyword = $request->keyword;
        $products = DB::table('products')->join('products_category', 'products.Category_ID', 'products_category.Category_ID')
        ->where('ProdName','like',"%$keyword%")
        ->orWhere('products_category.CateName','like',"%$keyword%")
        ->orWhere('ProdCompany','like',"%$keyword%")->paginate(9);
        
        return view('Spa.Giaodien.search', ['products'=>$products, 'keyword'=>$keyword]);
    }
    //Chi tiết dịch vụ
    public function serviceDetail($Slug_service){
        $serve_Detail = DB::table('service')->where('Slug_service', $Slug_service)->first();

        return view ('Spa.Giaodien.serviceDetail', ['serve_Detail'=>$serve_Detail]);
    }
    //Chi tiết tips
    public function tipDetail($Slug_tips){
        $tip_Detail = DB::table('tips')->join('tips_category', 'tips.TipsCategory_ID', 'tips_category.TipsCategory_ID')->where('Slug_tips', $Slug_tips)->first();

        $details_tip = DB::table('tips')->join('tips_category', 'tips.TipsCategory_ID', 'tips_category.TipsCategory_ID')->where('Slug_tips', $Slug_tips)->get();

        foreach($details_tip as $key => $value){
            $TipsCategory_ID = $value->TipsCategory_ID;
        }

        $related_tip = DB::table('tips')->join('tips_category', 'tips.TipsCategory_ID', 'tips_category.TipsCategory_ID')->where('tips_category.TipsCategory_ID', $TipsCategory_ID)->whereNotIn('tips.Slug_tips', [$Slug_tips])->get();

        return view ('Spa.Giaodien.tipDetail', ['tip_Detail'=>$tip_Detail, 'related_tip'=>$related_tip]);
    }
    //Hồ sơ người dùng
    public function profileUser(){
        $this->AuthLogin();
        $profile_user = DB::table('account_users')->where('User_ID', Session::get('User_ID'))->first();
        return view('Spa.Giaodien.profileUser', ['profile_user'=>$profile_user]);
    }
    //Cập nhật hồ sơ
    public function getEditUser(){
        $this->AuthLogin();
        $profile_user = DB::table('account_users')->where('User_ID', Session::get('User_ID'))->first();
        return view('Spa.Giaodien.editUser', ['profile_user'=>$profile_user]);
    }

    public function postEditUser(Request $request, $User_ID){
        $user = Users::find($User_ID);
        $this->validate($request,
        [
            'Username'=>'required',
            'Email'=>'required',
            'FirstName'=>'required',
            'LastName'=>'required',
            'Address'=>'required',
            'City'=>'required',
            'Country'=>'required',
            'PostalCode'=>'required',
            'AboutMe'=>'required'
        ],
        [
            'Username.required'=>'Bạn chưa nhập tên đăng nhập !',
            'Email.required'=>'Bạn chưa nhập địa chỉ Email',
            'FirstName.required'=>'Bạn chưa nhập Họ !',
            'LastName.required'=>'Bạn chưa nhập tên !',
            'City.required'=>'Bạn chưa nhập Thành Phố !',
            'Address.required'=>'Bạn chưa nhập địa chỉ, nơi sống !',
            'Country.required'=>'Bạn chưa nhập Quốc gia !',
            'PostalCode.required'=>'Bạn chưa nhập Mã Postal !',
            'AboutMe.required'=>'Bạn chưa nhập chú thích !'
        ]);

       $user->FirstName = $request->FirstName;
       $user->LastName = $request->LastName;
       $user->Address = $request->Address;
       $user->City = $request->City;
       $user->Country = $request->Country;
       $user->PostalCode = $request->PostalCode;
       $user->AboutMe = $request->AboutMe;

       $user->save();

       return redirect('eluvspa/ho-so')->with('alert', 'Cập nhật thông tin thành công !');
    }
    // Check out
    public function CheckOut(){
        return view('Spa.Giaodien.checkout');
    }
    // SAVE CHECK OUT
    public function saveCheckOut(Request $request){

        $check = array();
        $check['FirstName'] = $request->FirstName;
        $check['LastName'] = $request->LastName;
        $check['Address'] = $request->Address;
        $check['Email'] = $request->Email;
        $check['SĐT'] = $request->SĐT;
        $check['Notes'] = $request->Notes;
        $checkID = DB::table('checkout')->insertGetId($check);

        Session::put('Check_ID', $checkID);

        // lấy hình thức thanh toán
        $data = array();
        $data['PaymentMethod'] = $request->paymentMethod;
        $data['PaymentStt'] = 'Đang chờ xử lý';
        $paymentID = DB::table('payment_method')->insertGetId($data);
        //Insert order db
        $content = Cart::content();
        foreach($content as $cnt){
            $order_db = array();
            $order_db['User_ID'] = Session::get('User_ID');
            $order_db['Check_ID'] = Session::get('Check_ID');
            $order_db['Payment_ID'] = $paymentID;
            $order_db['Prod_ID'] = $cnt->id;
            $order_db['ProdName'] = $cnt->name;
            $order_db['Quantity'] = $cnt->qty;
            $order_db['Order_total'] = Cart::total();
            $order_db['Order_status'] = 'Đang chờ xử lý';
            $orderID = DB::table('orders')->insertGetId($order_db);
        }

        if($data['PaymentMethod'] == 1){
            echo 'Thanh toán bằng thẻ tín dụng hoặc thẻ ghi nợ';
        } elseif ($data['PaymentMethod'] == 2) {
            Cart::destroy();
            return view('Spa.Giaodien.thanks');
        } else {
            echo 'Thanh toán qua Paypal';
        }
    }
    // Booking Service
    public function booking(Request $request){

        $booking['SĐT'] = $request->booking_phone;
        $booking['User_ID'] = $request->user_hidden;
        $booking['Branch'] = $request->spa_name;
        $booking['Service_ID'] = $request->service_name;
        $booking['Status'] = 'Đang chờ';
        $booking['Date_Bking'] = $request->booking_date;
        $Booking_Service = DB::table('booking')->insertGetId($booking);

        return redirect('eluvspa');
    }
    // Lich su mua hang
    public function history(){
        $this->AuthLogin();
        $orders = DB::table('orders')->join('checkout', 'orders.Check_ID', 'checkout.Check_ID')->where('User_ID', Session::get('User_ID'))->get();
        $booking = DB::table('booking')->join('service', 'booking.Service_ID', 'service.Service_ID')->where('User_ID', Session::get('User_ID'))->get();
        return view ('Spa.Giaodien.history', ['orders'=>$orders, 'booking'=>$booking]);
    }
}
