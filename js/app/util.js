String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
};
String.prototype.toTitleCase = function() {
    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

function parseTimestamp(timestamp){
    if (timestamp === null){return;}
    var t = timestamp.split(/[- :]/);
    var date = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
    return date;
}

function getYear(date){
    return date.getFullYear();
}
    
function getMonth(date,abbrev){
    abbrev = abbrev||false;
    var monthNames = (abbrev)?["Jan", "Feb", "Mar", "Apr", "May", "June",
    "July", "Aug", "Sept", "Oct", "Nov", "Dec"
    ]:["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
    ];
    return monthNames[date.getMonth()];
}

function getDay(date,abbrev){
    abbrev = abbrev || false;
    var dayNames = (abbrev)?(["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"]):(["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]);
    return dayNames[date.getDay()];
}

function adjustForTimezone(date){
    var timeOffsetInMS = date.getTimezoneOffset() * 60000;
    date.setTime(date.getTime() - timeOffsetInMS);
    return date;
}

function revertDateObject(dateline, timezoneOffset){
    return (new Date( dateline.getTime() - timezoneOffset * 3600 * 1000));
}

function addMinutes(date, minutes) {
    var result = new Date(date);
    result.setMinutes(result.getMinutes() + minutes);
    return result;
}

function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
}

function addMonths(date, months) {
    var result = new Date(date);
    result.setMonth(result.getMonth() + months);
    return result;
}