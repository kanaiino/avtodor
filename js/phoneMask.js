document.getElementById('phone').addEventListener('input', function(e) {
    let x = e.target.value.replace(/\D/g, '').substring(0, 11);
    let formatted = '+7(';
    if(x.length > 1) formatted += x.substring(1,4);
    if(x.length >= 4) formatted += ')'+x.substring(4,7);
    if(x.length >= 7) formatted += '-'+x.substring(7,9);
    if(x.length >= 9) formatted += '-'+x.substring(9,11);
    e.target.value = formatted;
});