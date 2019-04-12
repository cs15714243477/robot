/**
 * Created by Administrator on 2019/1/29 0029.
 */
//获取banner数据
function localIndexDevelopData(){
    $.ajax({
        url:"",
        data:{

        },
        type:"post",
        success:function(data){
            initIndexDevelopDom(data);
            $(".develop-box .develop-list .developCon").append(data);
            $('.developCon').slick({
                arrows:false,
                infinite:false,
                draggable:false,
                dots: true


            });
        }
    });
}

//加载banner结构
function initIndexDevelopDom(data){
    var box = $(".developCon");
    box.append('');
    $(data.bannerList).each(function(i, ele){
        var newDiv1 = $('<div ></div>').appendTo(box);
        var newH22 = $('<h2>2013年08月</h2>').appendTo(newDiv1);
        var newP = $('<p>1111111111</p>').appendTo(newDiv1);
    });

}