$(document).ready(function () {
  // Add event listener to booking date radio buttons
  const date_cards = document.querySelectorAll(".date-card");

  date_cards.forEach((date_card) => {
    date_card.addEventListener("click", () => {
      date_cards.forEach((c) => {
        if (c.classList.contains("date-selected")) {
          c.classList.remove("date-selected");
        }
      });
      date_card.classList.add("date-selected");

      time_cards.forEach((card) => {
        card.classList.remove("date-selected");
      });
      deleteBookingSeat();
      removeInput();
    });
  });

  // Add event listeners to show time radio buttons
  const time_cards = document.querySelectorAll(".showtime-card");
  const radioButtons = document.querySelectorAll('input[name="radio_showId"]');
  const inputValueField = document.getElementById("ticket_priceInput");
  const show_time = document.getElementById("show_time");

  radioButtons.forEach((radioButton, index) => {
    radioButton.addEventListener("click", () => {
      const booking_date = document.querySelector(
        'input[type="radio"][name="radio_showdate"]:checked'
      ).value;

      const showId = radioButton.value;
      updateCardColor(index);
      updateInputValue(showId);
      deleteBookingSeat();
      showBookingSeat(showId, booking_date);
      removeInput();
    });
  });
  // Function to update card color
  function updateCardColor(index) {
    time_cards.forEach((card, i) => {
      if (i === index) {
        card.classList.add("date-selected");
        show_time.value = card.textContent;
      } else {
        card.classList.remove("date-selected");
      }
    });
  }

  // Function to update ticket price value using AJAX
  function updateInputValue(showId) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `fetch_value.php?value=${showId}`, true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        inputValueField.value = xhr.responseText;
      }
    };

    xhr.send();
  }

  // Refresh Seat
  function deleteBookingSeat() {
    var container = document.querySelector(".seats-container");
    container.innerHTML = "";
  }

  // Function to show booking seat using AJAX
  function showBookingSeat(showId, booking_date) {
    const xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      `fetch_booking_seat.php?show_id=${showId}&booking_date=${booking_date}`,
      true
    );

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var seatArray = JSON.parse(xhr.responseText);
        console.log(seatArray);

        const seat_char = ["A", "B", "C", "D", "E", "F", "G", "H"];

        $("#seat_chart").append(
          '<div class="d-inline-flex align-items-center my-2"><span class="available"></span><span class="small mr-2">Available</span><span class="not-available"></span><span class="small mr-2">Not Available</span><span class="selectable"></span><span class="small mr-2">Selected</span></div>'
        );

        for (i = 0; i <= 7; i++) {
          $("#seat_chart").append('<div class="seats-row">');

          for (j = 1; j <= 12; j++) {
            // Check booking Seat
            var seatNumber = seat_char[i] + j;
            var isOccupied;
            if (seatArray.includes(seatNumber)) {
              isOccupied = "occupied";
            } else {
              isOccupied = "";
            }

            // Show people walkspae
            if (j == 3) {
              $("#seat_chart").append('<div class="walkspace"></div>');
            }
            if (j == 9) {
              $("#seat_chart").append('<div class="walkspace"></div>');
            }

            // booking seat design
            $("#seat_chart").append(
              '<div class="seat ' +
                isOccupied +
                '"><input type="checkbox" class="seat-checkbox" name="seat_chart[]" value="' +
                seatNumber +
                '">' +
                seatNumber +
                "</div></div>"
            );
          }
        }
        // Add event listeners to seats
        const seats = document.querySelectorAll(".seat");

        seats.forEach((seat) => {
          seat.addEventListener("click", () => {
            if (!seat.classList.contains("occupied")) {
              seat.classList.toggle("selected");
              const checkbox = seat.querySelector(".seat-checkbox");
              checkbox.checked = !checkbox.checked;
              checkboxtotal();
            }
          });
        });
      }
    };
    xhr.send();
  }

  function checkboxtotal() {
    var seat = [];
    $('input[name="seat_chart[]"]:checked').each(function () {
      seat.push($(this).val());
    });

    var st = seat.length;
    document.getElementById("no_ticket").value = st;

    $("#seat_number_dt").val(seat.join(","));

    var ticket_price = document.getElementById("ticket_priceInput").value;
    var t = ticket_price.replace(" Ks", "");

    var total = st * t + " Ks";
    $("#price_details").val(total);
  }

  function removeInput() {
    document.getElementById("no_ticket").value = "";
    document.getElementById("seat_number_dt").value = "";
    document.getElementById("price_details").value = "";
    document.getElementById("ticket_priceInput").value = "";   
  }

});
