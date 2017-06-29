
<a class="<?php if(Request::segment( 1) == 'myaccount'){ echo 'active'; } ?>" href="{{route('myaccount')}}">Profile</a>

<a class="<?php if(Request::segment( 1) == 'order_summery_lists'){ echo 'active'; } ?>" href="{{route('order_summery_lists')}}">Order History</a>

<a class="<?php if(Request::segment( 1) == 'lay_by_order_lists'){ echo 'active'; } ?>" href="{{route('lay_by_order_lists')}}">Lay by Order</a>

<a class="<?php if(Request::segment( 1) == 'pre_order_lists'){ echo 'active'; } ?>" href="{{route('pre_order_lists')}}">Pre Order</a>