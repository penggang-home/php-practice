const inputs = document.querySelectorAll(".input");
const username = document.querySelector('[name="username"]')

function focusFunction(){
    let parentNode = this.parentNode.parentNode;
    parentNode.classList.add('focus');
}
function blurFunction(){
    let parentNode = this.parentNode.parentNode;
    if(this.value == ''){
        parentNode.classList.remove('focus');
    }
}

inputs.forEach(input=>{
    input.addEventListener('focus',focusFunction);
    input.addEventListener('blur',blurFunction);
    username.focus();
});

function deleteInfo(title,url,state){
    if(state == 1){
        state = "已审核";
    }else{
        state = "未审核";
    }
    let checkState = confirm(`您确定要删除该文章吗？\n${title}————${state}`);
    if(checkState == true){
        // console.log(url);
        window.location.href = url;
    }
}

