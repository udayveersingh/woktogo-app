const drinkPoints = document.getElementById('drink').getAttribute('data-points');
const mealPoints = document.getElementById('meal').getAttribute('data-points');
const snackPoints = document.getElementById('snack').getAttribute('data-points');

//Function to update total points
function updateTotal() {
    const drinkCount = parseInt(document.getElementById('count-display-Drink').innerText) * drinkPoints;
    const mealCount = parseInt(document.getElementById('count-display-Meal').innerText) * mealPoints;
    const snackCount = parseInt(document.getElementById('count-display-Snack').innerText) * snackPoints;

    const totalPoints = drinkCount + mealCount + snackCount;
    document.getElementById('total-points').innerText = `${totalPoints}`;
    document.getElementById('totalPoints').value = totalPoints; // Use vanilla JS to set value
    console.log(totalPoints);
}


// Increment Function
function increment(type) {
    console.log(type, "test type");
    const countDisplay = document.getElementById(`count-display-${type}`);
    let currentCount = parseInt(countDisplay.innerText);
    // if (type == "Drink") {
    //     currentCount += 1;
    // } else if (type == "Meal") {
    //     currentCount += 8;
    // } else if (type == "Snack") {
    //     currentCount += 1;
    // }
    currentCount += 1;

    countDisplay.innerText = currentCount;

    updateTotal();
}

// Decrement Function
function decrement(type) {
    const countDisplay = document.getElementById(`count-display-${type}`);
    let currentCount = parseInt(countDisplay.innerText);
    // if (type == "Drink") {
    //     currentCount = Math.max(currentCount - 2, 0); // Ensure count does not go below zero
    // } else if (type == "Meal") {
    //     currentCount = Math.max(currentCount - 8, 0); // Ensure count does not go below zero
    // } else if (type == "Snack") {
    //     currentCount = Math.max(currentCount - 1, 0);
    // }
    currentCount = Math.max(currentCount - 1, 0);
    countDisplay.innerText = currentCount;

    updateTotal();
}

//Overlay functions for code input box 
function addOverlay() {
    const overlay = document.createElement('div');
    overlay.className = 'overlay';
    document.body.appendChild(overlay);
}

function removeOverlay() {
    const overlay = document.querySelector('.overlay');
    if (overlay) {
        overlay.remove();
    }

    // Remove z-index from the otp-container
    const otpContainer = document.querySelector('#otp-container');
    if (otpContainer) {
        otpContainer.style.zIndex = ''; // Remove the z-index by setting it to an empty string
    }
}

/*To open navigation menu, set the width to 60% of the background overlay*/
function openNav() {
    document.getElementById("sideBar").style.width = "100%";
    if (window.innerWidth < 768) {
        document.getElementById("sideNav").style.width = "60%";
    } else {
        document.getElementById("sideNav").style.width = "30%";
    }

}

/*Close navigation*/
function exitNav() {
    document.getElementById("sideBar").style.width = "0";
    document.getElementById("sideNav").style.width = "0";
}




document.getElementById('totalPoints').addEventListener('focus', function () {
    console.log('click on test and tested');
    // Set the input mode for numeric input
    this.setAttribute('inputmode', 'decimal'); // Tells mobile devices to use the numeric keypad with decimals

    // Also, add a custom key listener for handling the comma if needed (on iOS)
    this.addEventListener('input', function (event) {
        // Optionally, format the value with commas for better user experience
        this.value = this.value.replace(/[^0-9,\.]/g, ''); // Keep only numbers and commas/periods
    });
});


