var usid = "";
var finished = false;
var uploadUpdater;

function deletefile(row){
    row.className = 'delete';
    new Ajax.Request("index.php", {
        parameters: 'delete=' + encodeURIComponent(row.cells[0].innerHTML),
        onComplete: function(req){
            if (req.responseText == "successful") {
                row.parentNode.removeChild(row);
            }
            else {
                alert(req.responseText);
                row.className = 'off';
            }
        }
    });
}

function renameSync(){
    var fn = document.getElementById("file").value;
    if (fn == "") {
        document.getElementById("filename").value = '';
    }
    else {
        var filename = fn.match(/[\/|\\]([^\\\/]+)$/);
        if (filename == null) 
            filename = fn; //opera...
        else 
            filename = filename[1];
        
        document.getElementById("filename").value = filename;
    }
    
    filetypeCheck();
}

function filetypeCheck(){
	var fn_obj = document.getElementById("filename");
	if (fn_obj == null) return;
    var fn = fn_obj.value;
    if (fn == "") {
        document.getElementById("allowed").className = '';
        document.getElementById("upload").disabled = true;
    }
    else {
        var ext = fn.split(".");
        if (ext.length == 1) 
            ext = '.noext.';
        else 
            ext = '.' + ext[ext.length - 1].toLowerCase() + '.';
        
        if (ALLOWED_TYPES.indexOf(ext) == -1) {
            document.getElementById("allowed").className = 'red';
            document.getElementById("upload").disabled = true;
        }
        else {
            document.getElementById("allowed").className = '';
            document.getElementById("upload").disabled = false;
        }
    }
    
}

//enable ajax functionality
function beginUpload(sid){
    usid = sid;
    //define vars
    var uform = document.getElementById('uploadform').getElementsByTagName('form')[0];
    var upb = document.getElementById('upload_pb');
    if (uform.file.value == "") 
        return; //no file, no upload
    //make appear the progress bar
    document.getElementById('upload_filename').innerHTML = uform.filename.value;
    upb.style.height = uform.offsetHeight + "px";
    uform.style.display = 'none';
    upb.style.display = 'block';
    if (document.getElementById('makedirform') != null) 
        document.getElementById('makedirform').getElementsByTagName('form')[0].style.display = 'none';
    
    //redefine where the form post goes
    uform.action = UPLOAD_SCRIPT + '?sid=' + sid + '&maxsize=' + MAX_FILESIZE;
    uform.target = 'upload_iframe';
    uform.submit();
    
    //ajax magic
    uploadUpdater = new Ajax.PeriodicalUpdater({}, 'index.php', {
        'frequency': 1.0,
        'method': 'post',
        'parameters': 'progress=' + sid,
        'onSuccess': updateProgress,
        'onFailure': updateProgress
    });
}

//update progress bar
function updateProgress(req){
    if (finished) 
        return;
    
    var pb = document.getElementById('upload_progress');
    //we expect a number
    var percent = parseInt(req.responseText);
    //not a number...
    if (isNaN(percent)) {
        finished = true;
        uploadUpdater.stop();
        
        if (req.responseText == "FINISHED") {
            pb.style.width = "100%";
            return;
        }
        
        pb.style.width = 0;
        //error form redirect
        var form = document.createElement('form');
        form.method = 'post';
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'errormsg';
        input.value = escape(req.responseText);
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit(); //redirect
    }
    else {
        if (!percent) 
            percent = 0;
        if (percent > 100) 
            percent = 100;
        pb.style.width = "" + percent + "%";
    }
}
