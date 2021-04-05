$("document").ready(function(){

    // control for testimony button
    $("#viewsTestis").hide();

    $("#viewTesti").click(function(){
        $("#uploadtesti").hide();
        $("#viewsTestis").show();
    });

    $("#addTest").click(function(){
        $("#uploadtesti").show();
        $("#viewsTestis").hide();
    });

    // control for blogs button
    $("#viewsBlogP").hide();

    $("#viewBlog").click(function(){
        $("#uploadBlogs").hide();
        $("#viewsBlogP").show();
    });

    $("#addBlog").click(function(){
        $("#uploadBlogs").show();
        $("#viewsBlogP").hide();
    });

    // control for products button
    $("#viewProducts").hide();
    $("#deleteProduct").hide();

    $("#viewP").click(function(){
        $("#newProduct").hide();
        $("#viewProducts").show();
        $("#deleteProduct").hide();
    });

    $("#deleteP").click(function(){
        $("#newProduct").hide();
        $("#viewProducts").hide();
        $("#deleteProduct").show();
    });

    $("#newP").click(function(){
        $("#newProduct").show();
        $("#viewProducts").hide();
        $("#deleteProduct").hide();
    });

    $("#gridsCheck").change(function(){
        var st = this.checked;
        if(st){
          $(".signups").prop("disabled", false);
        } else{
          $(".signups").prop("disabled", true);
        }
        
    });

    
    // control for enquirires button
    $("#pendingQ").hide();
    $("#resolvedQ").hide();

    $("#pend").click(function(){
        $("#newQ").hide();
        $("#pendingQ").show();
        $("#resolvedQ").hide();
    });

    $("#resolved").click(function(){
        $("#newQ").hide();
        $("#pendingQ").hide();
        $("#resolvedQ").show();
    });

    $("#newsz").click(function(){
        $("#newQ").show();
        $("#pendingQ").hide();
        $("#resolvedQ").hide();
    });



})