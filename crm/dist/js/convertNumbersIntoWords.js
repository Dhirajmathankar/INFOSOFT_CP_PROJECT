// System for American Numbering 
var th_val = ['', 'thousand', 'million', 'billion', 'trillion'];
// System for uncomment this line for Number of English 
// var th_val = ['','thousand','million', 'milliard','billion'];
 
var dg_val = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
var tinfinity_value = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
var tw_val = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
function toWordsconver(s) {
  s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number ';
    var x_number_data = s.indexOf('.');
    if (x_number_data == -1)
        x_number_data = s.length;
    if (x_number_data > 15)
        return 'too big';
    var infinity_value = s.split('');
    var txt_data = '';
    var sk_val = 0;
    for (var i = 0; i < x_number_data; i++) {
        if ((x_number_data - i) % 3 == 2) {
            if (infinity_value[i] == '1') {
                txt_data += tinfinity_value[Number(infinity_value[i + 1])] + ' ';
                i++;
                sk_val = 1;
            } else if (infinity_value[i] != 0) {
                txt_data += tw_val[infinity_value[i] - 2] + ' ';
                sk_val = 1;
            }
        } else if (infinity_value[i] != 0) {
            txt_data += dg_val[infinity_value[i]] + ' ';
            if ((x_number_data - i) % 3 == 0)
                txt_data += 'hundred ';
            sk_val = 1;
        }
        if ((x_number_data - i) % 3 == 1) {
            if (sk_val)
                txt_data += th_val[(x_number_data - i - 1) / 3] + ' ';
            sk_val = 0;
        }
    }
    if (x_number_data != s.length) {
        var y_val = s.length;
        txt_data += 'point ';
        for (var i = x_number_data + 1; i < y_val; i++)
            txt_data += dg_val[infinity_value[i]] + ' ';
    }
    return txt_data.replace(/\s+/g, ' ');
}