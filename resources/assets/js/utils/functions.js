window.index = function(needle, heystack, key = 'id') {
    return heystack.findIndex(item => item[key] === needle[key]);
}
