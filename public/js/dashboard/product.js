$(function(){
    var logo = $('#productImg').Huploadify({
        auto:false,
        fileTypeExts:'*.jpg;*.png;*.jpeg',
        multi:false,
        formData:null,
        fileSizeLimit:99999999999,
        showUploadedPercent:true,
        showUploadedSize:true,
        removeTimeout:9999999,
        buttonText:'产品图片上传',
        auto:true,
        uploader:'/api/upload/images',
        onUploadStart:function(file){
            console.log(file.name+'开始上传');
        },
        onInit:function(obj){
            console.log('初始化');
            console.log(obj);
        },
        onUploadComplete:function(file, res){
            console.log(file.name+'上传完成');
            var resParsed = jQuery.parseJSON(res);
            $('#productImgDisplay').attr('src', resParsed.data);
            $('#productImgSubmit').val(resParsed.data)
            // $('#applyBtn').click();
            console.log(resParsed.data);
        },
        onCancel:function(file){
            console.log(file.name+'删除成功');
        },
        onClearQueue:function(queueItemCount){
            console.log('有'+queueItemCount+'个文件被删除了');
        },
        onDestroy:function(){
            console.log('destroyed!');
        },
        onSelect:function(file){
            console.log(file.name+'加入上传队列');
        },
        onQueueComplete:function(queueData){
            console.log('队列中的文件全部上传完成',queueData);
        }
    });
});