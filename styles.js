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

})