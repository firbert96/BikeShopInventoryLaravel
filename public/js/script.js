function errorOutput(error){
    let str = '';
    Object.entries(error).forEach(entry => {
        const [key, value] = entry;
        str += '<p>'+value+'</p>';
    });
    return str;
}