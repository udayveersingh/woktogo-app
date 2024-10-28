//Function to update total points
function updateTotal() {
    const drinkCount = parseInt(document.getElementById('count-display-Drink').innerText);
    const mealCount = parseInt(document.getElementById('count-display-Meal').innerText);
    const snackCount = parseInt(document.getElementById('count-display-Snack').innerText);

    const totalPoints = drinkCount + mealCount + snackCount;
    document.getElementById('total-points').innerText = `${totalPoints}`;
}


// Increment Function
function increment(type) {
    const countDisplay = document.getElementById(`count-display-${type}`);
    let currentCount = parseInt(countDisplay.innerText);
    currentCount += 1;
    countDisplay.innerText = currentCount;

    updateTotal();
}

// Decrement Function
function decrement(type) {
    const countDisplay = document.getElementById(`count-display-${type}`);
    let currentCount = parseInt(countDisplay.innerText);
    currentCount = Math.max(currentCount - 1, 0); // Ensure count does not go below zero
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