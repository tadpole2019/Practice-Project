function myStr(initialStr) {
    var str = initialStr;
    return {
        indexof: function(word) {
            let find = true;
            for (i=0;i<str.length;i++) {
                if (str.length < word.length) break;
                find = true;
                for (j=0;j<word.length;j++) {
                    if (str[i+j] !== word[j]) {
                        find = false;
                        break;
                    }
                }
        
                if (find) {
                    console.log(i);
                    break;
                }
            }
            if (!find) {
                console.log(-1);
            }
        }
    }
}
var mystr = myStr("It's a pencil.")
mystr.indexof("pencil")


