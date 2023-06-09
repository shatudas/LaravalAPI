@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();
@endphp
  

 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



   <li class="nav-item {{($prefix=='/user')?'menu-open':''}}">
    <a href="" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p>
      Manage User
      <i class="fas fa-angle-left right"></i>
     </p>
    </a>

    <ul class="nav nav-treeview">
     
     <li class="nav-item">
      <a href="{{ route('user.view') }}" class="nav-link {{($route=='user.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p> View User </p>
      </a>
     </li>

     <li class="nav-item">
      <a href="{{route('user.password.view')}}" class="nav-link {{($route=='user.password.views')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Change Password</p>
      </a>
     </li>

    </ul>
   </li>

   <li class="nav-item {{($prefix=='/item')?'menu-open':''}}">
    <a href="" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p>
      Manage Item
      <i class="fas fa-angle-left right"></i>
     </p>
    </a>

    <ul class="nav nav-treeview">
    
     <li class="nav-item">
      <a href="{{route('item.view')}}" class="nav-link {{($route=='item.views')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Item</p>
      </a>
     </li>

    </ul>
   </li>


   <li class="nav-item {{($prefix=='/category')?'menu-open':''}}">
    <a href="" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p>
      Manage Category
      <i class="fas fa-angle-left right"></i>
     </p>
    </a>

    <ul class="nav nav-treeview">
    
     <li class="nav-item">
      <a href="{{route('category.view')}}" class="nav-link {{($route=='category.views')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Category</p>
      </a>
     </li>

    </ul>
   </li>




   <li class="nav-item {{($prefix=='/product')?'menu-open':''}}">
    <a href="" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p>
      Manage Product
      <i class="fas fa-angle-left right"></i>
     </p>
    </a>

    <ul class="nav nav-treeview">
    
     <li class="nav-item">
      <a href="{{route('product.view')}}" class="nav-link {{($route=='product.views')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View Product</p>
      </a>
     </li>

    </ul>
   </li>


  

  </ul>
 </nav>