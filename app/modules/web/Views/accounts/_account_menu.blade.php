
<li role="presentation" class="<?php if(Request::segment( 1) == 'myaccount'){ echo 'active'; } ?>">
    <a href="{{route('myaccount')}}" >Profile</a>
</li>
<li role="presentation" class="<?php if(Request::segment( 1) == 'order_summery_lists'){ echo 'active'; } ?>">
    <a href="{{route('order_summery_lists')}}" >Order History</a>
</li>
<li role="presentation" class="<?php if(Request::segment( 1) == 'lay_by_order_lists'){ echo 'active'; } ?>">
    <a href="{{route('lay_by_order_lists')}}">Lay by Order</a>
</li>
<li role="presentation" class="<?php if(Request::segment( 1) == 'pre_order_lists'){ echo 'active'; } ?>">
    <a href="{{route('pre_order_lists')}}">Pre-Order</a>
</li>