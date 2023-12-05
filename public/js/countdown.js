(function(){
    const second = 1000,
    minunte = second * 60,
    hour = minunte * 60,
    day = hour * 24;

    let today = new Date(),
    dd = String(today.getDate()).padStart(2, "0"),
    mm = String(today.getMonth()+1).padStart(2, "0"),
    yyyy = today.getFullYear(),
    nextYear = yyyy + 1,
    dayMonth = "09/30/",
    birthday = dayMonth + yyyy;

    // today = mm
})