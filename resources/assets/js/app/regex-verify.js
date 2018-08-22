var regexNonWhiteSpace = function (args) {
    const regex = /[a-zA-Z]+/g;
    const str = args;
    var m;
    var arg = '';

    while ((m = regex.exec(str)) !== null) {
        // This is necessary to avoid infinite loops with zero-width matches
        if (m.index === regex.lastIndex) {
            regex.lastIndex++;
        }

        // The result can be accessed through the `m`-variable.
        m.forEach(function (match, groupIndex) {
            arg += match;
        });
    }
    return arg;
};
