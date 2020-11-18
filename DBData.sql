-- -----------------------------------------------------
-- Insert some data inside our tables (DB : office_warriors)
-- -----------------------------------------------------
USE office_warriors;
-- -----------------------------------------------------
-- Table user
-- -----------------------------------------------------

INSERT INTO user (
    username,
    email,
    password,
    is_admin,
    is_logged
  ) VALUES (
    "admin",
    "admin@admin.admin",
    "admin",
    "1",
    "1"
  );

-- -----------------------------------------------------
-- Table `item`
-- -----------------------------------------------------

INSERT INTO item (
    name,
    image,
    strength,
    energy,
    humor,
    agility
  ) VALUES (
    "tasse à café",
    "coffeCup.png",
    "1",
    "2",
    "0",
    "-1"
  );

-- -----------------------------------------------------
-- Table `event`
-- -----------------------------------------------------

INSERT INTO event 
(
    name,
    image,
    description,
    strength,
    energy,
    humor,
    agility,
    floor_restriction
    ) VALUES (
    "Spoiled brat", "intern.jpg", "The new intern touched your laptop during your absence. He opened up your Skype for Business account and sent insults to some coworkers of yours, all of this done in your name... Has the kid definitely ruined your reputation? You will enquire. But first, you must choose what he deserves.", "1", "0", "2", "2", "1"
), (
    "Vile macchiato", "coffee.jpg", "All you want is some tasty, sweet hot beverage. You intend to help yourself, but the evil coffee machine is after you. It spills the liquids all over your brand new shirt. Will you take revenge?", "2", "0", "1", "0", "1"
), (
    "I'm glad not to be a parent yet", "kids_chaos.jpg", "Your coworker is asking for a favor. You must go to the kindergarten to check on her toddler. The baby-sitter being her boyfriend's ex, she cannot reasonably entrust her with her own child! You thus proceed to the gate of hellish children screaming as you cross the area to get to the toddlers' section. Your jealous coworker's little guy is alright and making as much noise as everyone else there. Once out of the ongoing chaos, you return to the office.", "2", "5", "3", "2", "1" 
), (
    "A liquid gift", "coffee_meeting.jpg", "At break time, your manager wants to offer you some coffee. Usually mean and stingy, you suspect he wants to ask you a favor. How could you even say no?", "2", "0", "1", "1", "1"
), (
    "Tasty delicacies", "donuts.jpg", "It's smelly here. Your colleagues have again bought a box of donuts with some other pastries. They look disgusting to you since you have been forced to eat so many sugary things lately. Maybe it's time you refused?", "3", "2", "1", "0", "1"
), (
    "Man eater", "carnivorous_plant.jpg", "Time to show up at the dining hall! But a frightening carnivorous plant stands in your way, looking very hungry. Undoubtedly terrified, you toss your SD card to it, and watch it and it starts eating your data up. Horrified, you try to move pass the plant... will you survive?", "8", "3", "3", "0", "2"
), (
    "Nerd battle", "war.jpg", "You wanted to take a breath of fresh air outside. As you exit the building, you suddenly find yourself in the middle of a Nerf gun battle. How will you get yourself out of this perilous situation?", "8", "3", "3", "0", "2"
), (
    "Do I really have to attend?", "old_meeting.jpg", "Yet another meeting! All of your coworkers are waiting for you to attend it with them. It's going to be boring and endless...", "5", "3", "0", "2", "2"
), (
    "The sound of silence", "concert.jpg", "The coworker sitting next to you is improvising a concert in the open space. Some colleagues start joining in. The resulting racket is driving you nuts. You cannot focus on anything, and make up your mind about what strategy you'll come up with in order to deal with them", "0", "5", "2", "3", "2"
), (
    "Party in the USA", "surprise_party.jpg", "Here comes the fourth surprise party of the week! Not even funny to you anymore. And you have to quickly finish the work your boss requested. How will you manage to leave this party to return to work?", "5", "3", "2", "0", "2"
), (
    "Some more alcohol please!", "christmas_party.jpg", "It's almost Christmas, your coworkers still want to get drunk to celebrate. How can you avoid yet another day of debauchery?", "5", "3", "3", "0", "2"
), (
    "Teenage dream", "costumed_colleague.jpg", "John Marshmallow is waiting for you in front of your desk. He has put on his best costume for the occasion and expects you to have a great time acting like teenagers in front of a brand new console.", "5", "0", "5", "3", "3"
), (
    "Dreadful parking lot", "parking.jpg", "You entered the rat infested parking lot of the office building. The charming creatures smell your bags, looking for any food they could steal from you. Soon you are dropping a few drops of sweat and rush to the exit while screaming your head off.", "2", "4", "0", "5", "3"
), (
    "A wannabe NSA agent", "cctv.jpg", "Our beloved Head of Security spends hours in front of his live CCTV footages, and it's not to ensure your safety. The guy is eating his popcorn while watching the most influential employees have unexpected encounters in locked offices. Beware, Big Brother is watching you, too...", "1", "4", "8", "6", "3"
), (
    "Unexpected masquerade", "masked.jpg", "Your crush has prepared you a little surprise! They come to you masked and take your hand to lead you to the cafeteria. There you find your favorite type of cake, all dressed and waiting to be eaten. You are so glad! As you start eating it, you feel a little dizzy and your sight becomes obscure. Everything turns black as you start fainting. You have a dozen of seconds left to react.", "1", "4", "3", "0", "3"
), (
    "An offer you can't refuse", "boss_meeting.jpg", "Your boss has invited you to his office with his assistants. Promotion or termination?", "30", "10", "0", "10", "3"
), (
    "Happy post-it!", "post_it_office", "It's your birthday and your whole team decided to give your office a little makeover for the occasion...", "4", "6", "3", "0", "3"
);

-- -----------------------------------------------------
-- Table `action`
-- -----------------------------------------------------

INSERT INTO action
(
    stat,
    value,
    victory,
    defeat,
    event_id
    ) VALUES (
	"strength", "Slap him in the face.", "You did well.", "Hitting anyone outside of self-defense is bad.", "1"
), ("humor", "Joke about it like you mean it", "The smiles back and apologizes to you.", "Everyone thinks you mock an innocent kid.", "1"
), ("agility", "Discretely go hide in the restroom.", "The kid got spotted.", "You come across your angry manager as you flee.", "1"
), ("energy", "Shout 'It's that kid who did it!'", "People understood you're not guilty, congrats!", "Coworkers still think you did it.", "1"
), ("strength", "Punch the coffee machine", "It will no longer harm anyone.", "Your coworkers heard you, prepare to pay for a new coffee machine yourself.", "2"
), ("humor", "Laugh about the whole situation.", "A good mood always helps!", "Next time, the machine will harass you again.", "2"
), ("agility", "Try to avoid more spilling.", "You manage to save your shirt a bit.", "Your shirt is already ruined anyways...", "2"
), ("energy", "Dance the conga to calm yourself down.", "Others join in for a little fiesta!", "Others think you dancing with a dirty shirt makes you a weirdo.", "2"
), ("strength", "Slam the door on her face to express your frustration.", "It reminds her of how strong she dreams to be and she forgets about you, daydreaming of going to a gym club instead.", "To her, you're a violent, inconsiderate person.", "3"
), ("humor", "Crack a dark humor joke to your coworker about her child.", "She gets your humor and laughs straight away.", "She takes it personally and files a lawsuit against you for discrimination.", "3"
), ("agility", "Avoid your coworker at all costs so as to not provide her with any report.", "Since you gave her no feedback, she assumes all is well.", "Since you gave her no feedback, she assumes all is well.", "3"
), ("energy", "Run to her, give her the good news in a rush and disappear lightning fast.", "She genuinely thinks you are overbusy.", "She thinks you don't take her interests seriously.", "3"
), ("strength", "Smash the coffee machine selection button before he does.", "Your manager appreciates your dynamism and smiles back at you.", "He takes offense you wanna be the new Alpha.", "4"
), ("humor", "Claim he is the one deserving you buy him a drink.", "He feels flattered, a pay raise is on its way to you.", "He thinks you are making fun of him.", "4"
), ("agility", "Avoid spilling the beverage.", "He sees your agility and compliments you for having his back.", "He assumes you fear him and wants to take advantage of that.", "4"
), ("energy", "Say coffee is way healthier than energy drinks.", "He agrees and the two of you suddenly talk healthy diets.", "Too bad for you he really likes Redbull.", "4"
), ("strength", "Take the box away and throw it out of the window when no one is watching.", "You won't have to eat any.", "It was their only breakfast today.", "5"
), ("humor", "Claim you just received an online alert about a bomb threat downstairs.", "Everyone leaves the room and runs to the exit. Once alone, you add dirt and dust on the pastries so that they never buy from this fast food business again.", "No one believes you and you're forced to watch them eat those repugnant things.", "5"
), ("agility", "Pretend you're about to throw up.", "Success! They all run away.", "They spotted you faked it and think you hate them.", "5"
), ("energy", "Explain it's not healthy for your diet at the moment. You already had your sugar level filled at breakfast.", "They follow your example.", "They still long for their bad eating habits.", "5"
);