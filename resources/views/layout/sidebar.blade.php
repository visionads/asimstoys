<li class="sub-menu">
    <a class="active" href="{{ URL::route('user.dashboard') }}">
        <i class="icon-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="sub-menu">
    <a href={{URL::to('article/index')}}>
        <i class="icon-filter"></i>
        <span>Article/Page</span>
    </a>
</li>

<li class="sub-menu">
	<a href={{URL::to('user/user-list')}}>
		<i class="icon-user-md"></i>
		<span>Customer List</span>
	</a>
</li>


<li class="sub-menu">
    <a href="javascript:;">
        <i class="icon-bookmark"></i>
        <span>Product</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('product_group/index')}}>Product group</a></li>
        <li><a  href={{URL::to('product_subgroup/index')}}>Product sub group</a></li>
        <li><a  href={{URL::to('product/index')}}>Product</a></li>
        <li><a  href={{URL::to('gal_image/index')}}>Gallery Image</a></li>
        <li><a  href={{URL::to('brand-index')}}>Brand Name</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="javascript:;">
        <i class="icon-bookmark"></i>
        <span>Coupon Code</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('coupon/index')}}>Coupon Code</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="javascript:;">
        <i class="icon-bookmark"></i>
        <span>Order History</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('order_paid/index')}}>Order (Paid)</a></li>
        <li><a  href={{URL::to('lay_by/index')}}>Lay-By Order</a></li>
        <li><a  href={{URL::to('pre-order-list')}}>Pre-Order</a></li>
        <li><a  href={{URL::to('zip-pay-order')}}>Zip-Pay Order</a></li>
        <li><a style="height: 45px;line-height: 20px;" href={{URL::to('local-pickup-order')}}>Local Pickup Order ( by appoinment only ) </a></li>
		<li><a  href={{URL::to('archive-list')}}>Archive</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="javascript:;">
        <i class="icon-bookmark"></i>
        <span>Standard PostCode</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('standardpostcode/state')}}>State</a></li>
        <li><a  href={{URL::to('standardpostcode/postcode')}}>PostCode</a></li>
        <li><a  href={{URL::to('standardpostcode/suburb')}}>Suburb</a></li>
    </ul>
</li>



<li class="sub-menu">
    <a href="{{URL::to('cat_slider/index')}}">
        <i class="icon-book"></i>
        <span>Slider</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('cat_slider/index')}}>Cat Slider</a></li>
        <li><a  href={{URL::to('slider_image/index')}}>Slider Image</a></li>
    </ul>
</li>

{{--<li class="sub-menu">
    <a href="{{URL::to('menu/index')}}">
        <i class="icon-sitemap"></i>
        <span>Menu</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('menu_type/index')}}>Menu Type</a></li>
        <li><a  href={{URL::to('menu/index')}}>Menu</a></li>
    </ul>
</li>--}}

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('team/index')}}>--}}
        {{--<i class="icon-female"></i>--}}
        {{--<span>Team</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('skills/index')}}>--}}
        {{--<i class="icon-file"></i>--}}
        {{--<span>Skills</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('testimonial/index')}}>--}}
        {{--<i class="icon-camera"></i>--}}
        {{--<span>Testimonial</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('social_icon/index')}}>--}}
        {{--<i class="icon-anchor"></i>--}}
        {{--<span>Social Icon</span>--}}
    {{--</a>--}}
{{--</li>--}}


{{--<li class="sub-menu">
    <a href="{{URL::to('blog_cat/index')}}">
        <i class="icon-inbox"></i>
        <span>Blog</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('blog_cat/index')}}>Blog Cat</a></li>
        <li><a  href={{URL::to('blog_item/index')}}>Blog Item</a></li>
    </ul>
</li>--}}

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('media/index')}}>--}}
        {{--<i class="icon-camera"></i>--}}
        {{--<span>Media Manager</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('widget/index')}}>--}}
        {{--<i class="icon-book"></i>--}}
        {{--<span>Widget</span>--}}
    {{--</a>--}}
{{--</li>--}}

<li class="sub-menu">
    <a href="{{URL::to('user/profile-info')}}">
        <i class="icon-info"></i>
        <span>Profile</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('user/profile-info')}}>My Profile</a></li>
        <li><a  href={{URL::to('user/profile-picture-view')}}>Profile Picture</a></li>
        <li><a  href={{URL::to('user/change-user-password-view')}}>Password Change</a></li>
    </ul>
</li>


@if(Session::has('user_type'))
    @if(Session::get('user_type')=='admin')
        
        {{--<li class="sub-menu">--}}
            {{--<a href={{URL::to('user/request')}}>--}}
                {{--<i class="icon-trello"></i>--}}
                {{--<span>Invitation</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    @endif
@endif


<li class="sub-menu">
    <a href="{{URL::to('youtube/index')}}" >
        <i class="icon-youtube"></i>
        <span>Youtube Home Link</span>
    </a>
    
</li>


<li class="sub-menu">
    &nbsp;
</li>
<li class="sub-menu">
    &nbsp;
</li>
<li class="sub-menu">
    &nbsp;
</li>


