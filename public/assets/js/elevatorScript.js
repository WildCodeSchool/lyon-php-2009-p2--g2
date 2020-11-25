/*  ==========================================
    Elevator page
* ========================================== */

/*  ==========================================
    STATS
* ========================================== */

//Var default setting

let maxRemainingPoints = 2;
let remainingPoints = 2;
let strength = 0;
let energy = 0;
let humor = 0;
let agility = 0;

//Value selector

const remainingPointsValue = document.querySelector("#remainingPoints");
const strengthValue = document.querySelector("#strength");
const energyValue = document.querySelector("#energy");
const humorValue = document.querySelector("#humor");
const agilityValue = document.querySelector("#agility");

//+ and - selector

const strengthPlus = document.querySelector("#strengthPlus");
const strengthMinus = document.querySelector("#strengthMinus");
const energyPlus = document.querySelector("#energyPlus");
const energyMinus = document.querySelector("#energyMinus");
const humorPlus = document.querySelector("#humorPlus");
const humorMinus = document.querySelector("#humorMinus");
const agilityPlus = document.querySelector("#agilityPlus");
const agilityMinus = document.querySelector("#agilityMinus");

strengthValue.value = strength;
energyValue.value = energy;
humorValue.value = humor;
agilityValue.value = agility;
remainingPointsValue.textContent = remainingPoints;

strengthPlus.addEventListener("click", function()
    {
        if (remainingPoints > 0) {
            strength++;
            remainingPoints--;
            strengthValue.value = strength;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

strengthMinus.addEventListener("click", function()
    {
        if (remainingPoints < maxRemainingPoints && strength !== 0) {
            strength--;
            remainingPoints++;
            strengthValue.value = strength;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

energyPlus.addEventListener("click", function()
    {
        if (remainingPoints > 0) {
            energy++;
            remainingPoints--;
            energyValue.value = energy;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

energyMinus.addEventListener("click", function()
    {
        if (remainingPoints < maxRemainingPoints && energy !== 0) {
            energy--;
            remainingPoints++;
            energyValue.value = energy;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

humorPlus.addEventListener("click", function()
    {
        if (remainingPoints > 0) {
            humor++;
            remainingPoints--;
            humorValue.value = humor;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

humorMinus.addEventListener("click", function()
    {
        if (remainingPoints < maxRemainingPoints && humor !== 0) {
            humor--;
            remainingPoints++;
            humorValue.value = humor;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

agilityPlus.addEventListener("click", function()
    {
        if (remainingPoints > 0) {
            agility++;
            remainingPoints--;
            agilityValue.value = agility;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

agilityMinus.addEventListener("click", function()
    {
        if (remainingPoints < maxRemainingPoints && agility !== 0) {
            agility--;
            remainingPoints++;
            agilityValue.value = agility;
            remainingPointsValue.textContent = remainingPoints;
        }
    }
);

/*  ==========================================
    Elevator Doors
* ========================================== */

const leftDoor = document.querySelector("#leftDoor");
const rightDoor = document.querySelector("#rightDoor");
const medal = document.querySelector(".medal");
const next = document.querySelector(".fightButton");
const page = document.querySelector('#elevatorPage')

rightDoor.addEventListener("click", function()
    {
        rightDoor.classList.add("active-right");
        leftDoor.classList.add("active-left");
        medal.style.visibility = "visible";
        page.classList.remove("miniElevator");
    }
);

leftDoor.addEventListener("click", function()
    {
        rightDoor.classList.add("active-right");
        leftDoor.classList.add("active-left");
        medal.style.visibility = "visible";
        page.classList.remove("miniElevator");
    }
);

next.addEventListener("click", function()
    {
        rightDoor.classList.remove("active-right");
        leftDoor.classList.remove("active-left");
        medal.style.visibility = "hidden";
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        setTimeout(function()
        { document.querySelector("#elevatorForm").submit(); }, 800);
    }
);
