let arr = [];

function luckynumber(){
    let num = Math.random()*42 + 1;
    num = Math.floor(num);
    return num;
}

let i = 0;
while(i<7){
    if(i !== 0){
        for(j=0;j<i;j++){
            if(arr[j] == num){
                num = luckynumber();
                j = 0;
            }
        }
        arr.push(num);
    }else{
        num = luckynumber();
        arr.push(num);
    }
    i++;
}


for(i=0;i<6;i++){
    console.log(`第${i+1}個號碼是:${arr[i]}`);
}
console.log(`特別號碼是${arr[6]}`);
