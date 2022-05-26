
	$(document).ready(function(){
		$("#li1").mouseover(function(){
			$("#li1 img").attr("src","admin/images/用户1.png");
		});
		$("#li1").mouseout(function(){
			$("#li1 img").attr("src","admin/images/用户.png");
		});
		$("#li2").mouseover(function(){
			$("#li2 img").attr("src","admin/images/课程管理1.png");
		});
		$("#li2").mouseout(function(){
			$("#li2 img").attr("src","admin/images/课程管理.png");
		});
		$("#li3").mouseover(function(){
			$("#li3 img").attr("src","admin/images/选课1.png");
		});
		$("#li3").mouseout(function(){
			$("#li3 img").attr("src","admin/images/选课.png");
		});
		$("#li4").mouseover(function(){
			$("#li4 img").attr("src","admin/images/文件-通知文件1.png");
		});
		$("#li4").mouseout(function(){
			$("#li4 img").attr("src","admin/images/文件-通知文件.png");
		});
		$("#li5").mouseover(function(){
			$("#li5 img").attr("src","admin/images/客服1.png");
		});
		$("#li5").mouseout(function(){
			$("#li5 img").attr("src","admin/images/客服.png");
		});


	    $("#li1").click(function(){
		    $("#users_guanli").css("display","block");
		    $("#class_guanli").css("display","none");
		    $("#xuanke_guanli").css("display","none");
		    $("#notice_guanli").css("display","none");
		});

	    $("#li2").click(function(){
		    $("#users_guanli").css("display","none");
		    $("#class_guanli").css("display","block");
		    $("#xuanke_guanli").css("display","none");	
		    $("#notice_guanli").css("display","none");	
		});

		 $("#li3").click(function(){
		    $("#users_guanli").css("display","none");
		    $("#class_guanli").css("display","none");
		    $("#xuanke_guanli").css("display","block");
		    $("#notice_guanli").css("display","none");
		});

		  $("#li4").click(function(){
		    $("#users_guanli").css("display","none");
		    $("#class_guanli").css("display","none");
		    $("#xuanke_guanli").css("display","none");
		    $("#notice_guanli").css("display","block");
		});

	});

	$(function(){
       $("#users_").keyup(function(){
          $("table tr").hide().filter(":contains('"+( $(this).val() )+"')").show();
       }).keyup();
    });

    $(function(){
       $("#class_").keyup(function(){
          $("table tr").hide().filter(":contains('"+( $(this).val() )+"')").show();
       }).keyup();
    });

    $(function(){
       $("#xuanxiuke_").keyup(function(){
          $("table tr").hide().filter(":contains('"+( $(this).val() )+"')").show();
       }).keyup();
    });




function backtop() {
  var c = document.documentElement.scrollTop || document.body.scrollTop;

  if (c > 0) {
    window.requestAnimationFrame(backtop);
    window.scrollTo(0, c - c / 8);
  }
}







function span11(){
	document.getElementById('users_head').style.display = "block";
	document.getElementById('span_11').style.borderBottom = "2px solid #8ed0f2";
	document.getElementById('users_two').style.display = "none";
	document.getElementById('span_12').style.borderBottom = "0";
}
function span12(){
	document.getElementById('users_head').style.display = "none";
	document.getElementById('span_11').style.borderBottom = "0";
	document.getElementById('users_two').style.display = "block";
	document.getElementById('span_12').style.borderBottom = "2px solid #8ed0f2";
}

function span21(){
	document.getElementById('class_head').style.display = "block";
	document.getElementById('span_21').style.borderBottom = "2px solid #8ed0f2";
	document.getElementById('class_two').style.display = "none";
	document.getElementById('span_22').style.borderBottom = "0";
}
function span22(){
	document.getElementById('class_head').style.display = "none";
	document.getElementById('span_21').style.borderBottom = "0";
	document.getElementById('class_two').style.display = "block";
	document.getElementById('span_22').style.borderBottom = "2px solid #8ed0f2";
}

function span31(){
	document.getElementById('xuanxiu').style.display = "block";
	document.getElementById('span_31').style.borderBottom = "2px solid #8ed0f2";
	document.getElementById('chakan').style.display = "none";
	document.getElementById('span_32').style.borderBottom = "0";
}
function span32(){
	document.getElementById('xuanxiu').style.display = "none";
	document.getElementById('span_31').style.borderBottom = "0";
	document.getElementById('chakan').style.display = "block";
	document.getElementById('span_32').style.borderBottom = "2px solid #8ed0f2";
}
 
function tishi_d()
    {
        //找所有选中项
        var ck = document.getElementsByClassName("ck");
         
        var str = "";
         
        for(var i=0;i<ck.length;i++)
        {
            if(ck[i].checked)
            {
                str += ck[i].value+",";
            }
        }
         
        return confirm("确定要删除以下CID的课程吗："+str+"");
    }


