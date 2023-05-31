<body>
  <div class="wrapper">
    <header>
      <p class="current-date">May 2023</p>
      <div class="icons">
        <i class="fas fa-chevron-left"></i>
        <i class="fas fa-chevron-right"></i>
      </div>
    </header>
    <div class="calendar">
      <ul class="weeks">
        <li>Sun</li>
        <li>Mon</li>
        <li>Tue</li>
        <li>Wed</li>
        <li>Thu</li>
        <li>Fri</li>
        <li>Sat</li>
      </ul>
      <ul class="days">
        <!-- Days will be dynamically generated -->
      </ul>
    </div>
  </div>
  <script>
    const daysTag = document.querySelector(".days");
    const currentDate = document.querySelector(".current-date");
    const prevIcon = document.querySelector(".icons .fa-chevron-left");
    const nextIcon = document.querySelector(".icons .fa-chevron-right");

    // getting new date, current year and month
    let date = new Date();
    let currYear = date.getFullYear();
    let currMonth = date.getMonth();

    // storing full name of all months in array
    const months = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    const renderCalendar = () => {
      let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(); // getting first day of month
      let lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(); // getting last date of month
      let lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(); // getting last day of month
      let lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
      let liTag = "";

      for (let i = firstDayofMonth; i > 0; i--) {
        // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
      }

      for (let i = 1; i <= lastDateofMonth; i++) {
        // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday =
          i === date.getDate() &&
          currMonth === new Date().getMonth() &&
          currYear === new Date().getFullYear() ?
          "active" :
          "";
        liTag += `<li class="${isToday}">${i}</li>`;
      }

      for (let i = lastDayofMonth; i < 6; i++) {
        // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
      }
      currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
      daysTag.innerHTML = liTag;
    };

    renderCalendar();

    prevIcon.addEventListener("click", () => {
      // decrement current month by 1
      currMonth--;

      if (currMonth < 0) {
        // if current month is less than 0, update year and month accordingly
        currYear--;
        currMonth = 11; // December
      }

      date = new Date(currYear, currMonth, new Date().getDate()); // create a new date with updated year and month
      renderCalendar(); // call renderCalendar function
    });

    nextIcon.addEventListener("click", () => {
      // increment current month by 1
      currMonth++;

      if (currMonth > 11) {
        // if current month is greater than 11, update year and month accordingly
        currYear++;
        currMonth = 0; // January
      }

      date = new Date(currYear, currMonth, new Date().getDate()); // create a new date with updated year and month
      renderCalendar(); // call renderCalendar function
    });
  </script>

</body>