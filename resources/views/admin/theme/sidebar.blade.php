    <nav id="sidebar">
        <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{asset('admin/images/img.jpg')}});"></a>
        <ul class="list-unstyled components mb-5">
            <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            Quản lý tài khoản
            </a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
                <a href="{{route('user.index')}}">Tài khoản đang hoạt động</a>
            </li>
            <li>
                <a href="{{route('user.hidden_user')}}">Tài khoản bị khóa</a>
            </li>
            
            </ul>
            </li>
            <li>
                <li>
                    <a href="{{route('category.index')}}">Danh mục sản phẩm</a>
                </li>
            </li>
          
            <li>           
            <a href="#other" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            Quản lý đơn hàng
            </a>
            <ul class="collapse list-unstyled" id="other">
                <li>
                <a href="">Đơn hàng chờ duyệt</a>
                </li>               
                <li>                    
                <a href="{{asset('panel/theotherisshipping')}}">Đơn hàng đang vận chuyển</a> 
                </li>
                <li>                    
                <a href="{{asset('panel/successfulother')}}">Đơn hàng thành công</a> 
                </li>
                <li>                    
                <a href="{{asset('panel/theotherwascanceled')}}">Đơn hàng đã bị hủy</a>
                </li>
            
            </ul>           
            </li>      
            <li>      

            <li>           
            <a href="#laptop" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            Quản lý Laptop
            </a>
            <ul class="collapse list-unstyled" id="laptop">
                <li>
                <a href="{{route('laptop.index')}}">Laptop</a>
                </li>               
                <li>                    
                    <a href="{{route('laptop.hidden_laptop')}}">Danh sách laptop bị ẩn khỏi hệ thống</a>
                </li>                
            </ul>           
            </li>    
            <li>           
            <a href="#pc" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            Quản lý PC
            </a>
            <ul class="collapse list-unstyled" id="pc">
                <li>
                <a href="{{route('pc.index')}}">PC</a>
                </li>               
                <li>                    
                <a href="{{route('pc.hidden_pc')}}">Danh sách PC bị ẩn khỏi hệ thống</a>
                </li>
            
            </ul>           
            </li>      
            <li>           
            <a href="#monitor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            Quản lý Màn hình
            </a>
            <ul class="collapse list-unstyled" id="monitor">
                <li>
                <a href="{{route('monitor.index')}}">Màn hình</a>
                </li>               
                <li>                    
                <a href="{{route('monitor.hidden_monitor')}}">Danh sách màn hình bị ẩn khỏi hệ thống</a>
                </li>
            
            </ul>           
            </li>                  
            <a href="#">Portfolio</a>
            </li>
            <li>
            <a href="#">Contact</a>
            </li>
         </ul>

    <div class="footer">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div>

    </div>
</nav>