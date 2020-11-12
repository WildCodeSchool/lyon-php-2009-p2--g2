/*  ==========================================
    Character creation page
* ========================================== */

/*  ==========================================
    Image upload
* ========================================== */

let output = document.getElementById('output');

function loadFile() {
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src)
    }
};


/*  ==========================================
    STATS
* ========================================== */

//Var default setting

let maxRemainingPoints = 10;
let remainingPoints = 10;
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