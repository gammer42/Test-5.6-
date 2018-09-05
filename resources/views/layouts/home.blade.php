<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
  @include('layouts.admin_include.head')
        
</head>

<body>
        <!-- start: Header -->
    @include('layouts.admin_partials.header')
    <!-- start: Header -->
    
        <div class="container-fluid-full">
        <div class="row-fluid">
                
            <!--s start: Main Menu -->
            @include('layouts.admin_partials.menu')
            <!-- end: Main Menu -->
            
            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>
            
            <!-- start: Content -->
            <div id="content" class="span10">
            
            @yield('content')

            </div><!--/.fluid-container-->
    
            <!-- end: Content -->
        </div><!--/#content.span10-->
        </div><!--/fluid-row-->
        
    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
@include('layouts.admin_partials.footer')
    
    <!-- start: JavaScript-->

@include('layouts.admin_include.js')
    <!-- end: JavaScript-->
<script type="text/javascript">
    function confirmDelete(){
        var msg = confirm('Are you sure to delete this?');
        if(msg)
            return true;
        else return false;
    }

</script>
</body>

</html>