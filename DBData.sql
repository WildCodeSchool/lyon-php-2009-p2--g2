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
    "https://via.placeholder.com/150",
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
), (
	"humor", "Joke about it like you mean it", "The smiles back and apologizes to you.", "Everyone thinks you mock an innocent kid.", "1"
), (
	"agility", "Discretely go hide in the restroom.", "The kid got spotted.", "You come across your angry manager as you flee.", "1"
), (
	"energy", "Shout 'It's that kid who did it!'", "People understood you're not guilty, congrats!", "Coworkers still think you did it.", "1"
), (
	"strength", "Punch the coffee machine", "It will no longer harm anyone.", "Your coworkers heard you, prepare to pay for a new coffee machine yourself.", "2"
), (
	"humor", "Laugh about the whole situation.", "A good mood always helps!", "Next time, the machine will harass you again.", "2"
), (
	"agility", "Try to avoid more spilling.", "You manage to save your shirt a bit.", "Your shirt is already ruined anyways...", "2"
), (
	"energy", "Dance the conga to calm yourself down.", "Others join in for a little fiesta!", "Others think you dancing with a dirty shirt makes you a weirdo.", "2"
), (
	"strength", "Slam the door on her face to express your frustration.", "It reminds her of how strong she dreams to be and she forgets about you, daydreaming of going to a gym club instead.", "To her, you're a violent, inconsiderate person.", "3"
), (
	"humor", "Crack a dark humor joke to your coworker about her child.", "She gets your humor and laughs straight away.", "She takes it personally and files a lawsuit against you for discrimination.", "3"
), (
	"agility", "Avoid your coworker at all costs so as to not provide her with any report.", "Since you gave her no feedback, she assumes all is well.", "Since you gave her no feedback, she assumes all is well.", "3"
), (
	"energy", "Run to her, give her the good news in a rush and disappear lightning fast.", "She genuinely thinks you are overbusy.", "She thinks you don't take her interests seriously.", "3"
), (
	"strength", "Smash the coffee machine selection button before he does.", "Your manager appreciates your dynamism and smiles back at you.", "He takes offense you wanna be the new Alpha.", "4"
), (
	"humor", "Claim he is the one deserving you buy him a drink.", "He feels flattered, a pay raise is on its way to you.", "He thinks you are making fun of him.", "4"
), (
	"agility", "Avoid spilling the beverage.", "He sees your agility and compliments you for having his back.", "He assumes you fear him and wants to take advantage of that.", "4"
), (
	"energy", "Say coffee is way healthier than energy drinks.", "He agrees and the two of you suddenly talk healthy diets.", "Too bad for you he really likes Redbull.", "4"
), (
	"strength", "Take the box away and throw it out of the window when no one is watching.", "You won't have to eat any.", "It was their only breakfast today.", "5"
), (
	"humor", "Claim you just received an online alert about a bomb threat downstairs.", "Everyone leaves the room and runs to the exit. Once alone, you add dirt and dust on the pastries so that they never buy from this fast food business again.", "No one believes you and you're forced to watch them eat those repugnant things.", "5"
), (
	"agility", "Pretend you're about to throw up.", "Success! They all run away.", "They spotted you faked it and think you hate them.", "5"
), (
	"energy", "Explain it's not healthy for your diet at the moment. You already had your sugar level filled at breakfast.", "They follow your example.", "They still long for their bad eating habits.", "5"
), (
	"strength", "Muzzle it with scotch tape.", "It suffocates and dies.", "Its acidic mouth disintegrates the scotch tape and it now bites you.", "6"
), (
	"humor", "Let's see the good side of things, that SD card wasn't yours anyways.", "You won't have to throw it in the trash.", "The card owner is mad at you.", "6"
), (
	"agility", "Jump like a rabbit!", "You managed to pounce on time!", "You fall to the ground and the plant suddenly turns to you.", "6"
), (
	"energy", "Wave your hands in front of the plant like you don't care.", "The flora monster gets dizzy from such movements and you move forward safely.", "You weren't fast enough and it snatches your hand. Ouch that hurts.", "6"
), (
	"strength", "Drag all the tables out of the room.", "They understand this meeting was too much.", "They bring their stuff in the corridor and the meeting still begins.", "7"
), (
	"humor", "Say you won't attend because no one is wearing a real business attire.", "They all laugh and invite you to take a seat.", "They think you're snobbish.", "7"
), (
	"agility", "Run away.", "They think you forgot something and will come back.", "They think you avoid them.", "7"
), (
	"energy", "Offer to bring them some Coca-Cola.", "They were thirsty and thank you.", "One of the seniors who doesn't know he has diabetes suddenly feels bad.", "7"
), (
	"strength", "Approach a microphone and scream loudly into it.", "Your strong vocal chords pierces their eardrums, they leave.", "Their ears start ringing and they complain to senior management.", "8"
), (
	"humor", "Tell them the song they're playing is exactly what was played at your relative's funeral, and pretend to cry.", "Moved by your words, your colleagues stop and apologize to you.", "They apologize and change song. Mission failed.", "8"
), (
	"agility", "Grab your laptop and fake going to a meeting.", "You successfully found an empty room to isolate yourself in.", "The receptionist sees you walking by and intercepts you, explaining your name isn't registered for any meeting room booking at the moment.", "8"
), (
	"energy", "Grab a microphone and start purposely singing very badly to upset them.", "Your little karaoke disgusts everyone and they successfully stop their concert.", "They politely put you aside, away from the microphone.", "8"
), (
	"strength", "Flip the table with rage.", "People admire your strength.", "They are upset you wasted their food.", "9"
), (
	"humor", "Insist you absolutely want the party to take place outside.", "While everyone begins moving out, you go hide elsewhere.", "People request your help with moving things around.", "9"
), (
	"agility", "Rob them from their pointy hats to create a diversion and run away to hide them.", "Your tactics worked.", "They find the hats way too quickly and still end up drinking.", "9"
), (
	"energy", "You decide to put your energy into a board game.", "You united everyone.", "People want to get drunk anyways.", "9"
), (
	"strength", "Minutes before the party begins, you grab all the alcoholic beverages at once, and you empty them and fill them with water.", "No one will get drunk.", "They realize what's going on and get after you.", "10"
), (
	"humor", "Use a dark humor joke about how your former boss ended up last time thanks to his love for alcohol.", "They take you seriously and store the bottles away.", "They don't care.", "10"
), (
	"agility", "Stay there for 10 minutes, then pretend to go use the restroom to leave and not come back.", "You successfully escape.", "A coworker follows you and leaves you no choice but to come back.", "10"
), (
	"energy", "Say you'll offer everyone a hot beverage, this way you'll be busy doing round-trips to and from the coffee machine.", "You get away with it.", "They still insist you stay.", "10"
), (
	"strength", "Destroy the remote controller.", "He has an extra one and hands it over to you.", "You just lost a friend.", "11"
), (
	"humor", "You sneak in behind his back, all the way to his office, to steal and hide his business clothing.", "He and everyone starts looking for his clothes, and you pretend to be the hero by having found it.", "Caught in the act, you get insulted by people.", "11"
), (
	"agility", "You decide to put on your own suit in the restroom.", "You stay inside there, locked up, and don't have to play video games with him.", "The toilets spill ovet their water on you and you smell terribly bad.", "11"
), (
	"energy", "Play with him in Forza Motorsport until you can't anymore.", "You are having fun.", "Your report is not ready on time.", "11"
), (
	"strength", "Grab your baseball bat and hit them all!", "You killed the vast majority of them.", "Your baseball bat is now disgusting and you'll have to disinfect it.", "12"
), (
	"humor", "You find a parallel between Mickey Mouse and his nice cousins.", "You take it lightly.", "You're too busy laughing out loud you don't notice some rats start attacking your feet.", "12"
), (
	"agility", "You manage to run till the exit.", "No need to go jogging tonight.", "They'll get you next time.", "12"
), (
	"energy", "You spill and empty rat poisoning bottles onto the floor.", "You get rid of some of them.", "You will see their corpses tonight.", "12"
), (
	"strength", "Give him the middle finger on camera.", "Impressed by your strong personality, he now treats you as an ally.", "He comes to your office and throws garbage all over the place.", "13"
), (
	"humor", "Make a sign where you write him a message that will make him feel theatened.", "Afraid of your legal proofs against him, he then hands you a letter of deep apologies.", "He calls his mafia friends on you to silence you.", "13"
), (
	"agility", "You decide you're part of a Mission Impossible scenario each time you move across a corridor.", "Your body flexibility makes you as stealthy as a wolf in the dark.", "You forgot the locations of some CCTV cameras and still get spotted.", "13"
), (
	"energy", "Trigger the sprinklers so as to destroy all cameras.", "It will take time to get new CCTV cameras.", "One of the cameras filmed you beforehand, and it's a proof you're guilty.", "13"
), (
	"strength", "Punch them and drag yourself all the way to the corridor, screaming for help.", "The new assistant who's passing by immediately understands how bad the situation is, she gets you saved and has them arrested.", "People think your calls for help are a joke and no one reacts on time.", "14"
), (
	"humor", "Joke about how pleasant their new stay in jail will be.", "They realize the consequences of having a criminal record and hand themselves to the police after having dialed 911 to save you.", "They finish you up with a punch in your head.", "14"
), (
	"agility", "Take your phone out of your pocket to dial 911.", "A 911 agent locates you quickly and informs the Head of Security of your company. Police is on the way.", "You didn't dial fast enough.", "14"
), (
	"energy", "Grab the knife and point it at your former crush.", "They run away scared.", "They aren't impressed because you're already weakened enough.", "14"
), (
	"strength", "Enter his office showing off your muscles to prove that you too like wrestling.", "He's glad to have found a common interest with you.", "He thinks you are defying him.", "15"
), (
	"humor", "Pretend you had been waiting for this moment for such a long time.", "He too has been waiting for a long time to promote you.", "'You're fired!'", "15"
), (
	"agility", "Display your best poker face ever.", "He likes your humility.", "He has the impression you don't care about the job.", "15"
), (
	"energy", "Say you're ready for action because you're full of energy.", "He loves the fact that you are so enthusiastic.", "He interprets your confidence as insolence.", "15"
), (
	"strength", "Go pick up a huge, heavy fan which you turn on to maximum speed to get rid of everything without much effort.", "You get the job done fast. Good riddance!", "The surplus of power consumption triggers a short-circuit.", "16"
), (
	"humor", "Laugh so loud everyone thinks you truly enjoy this new style.", "People appreciate that you value their ideas.", "Your colleagues think you are making fun of them.", "16"
), (
	"agility", "It doesn't matter, you will still get your work done.", "You gain some more adaptability and creativity skills.", "Your boss visits your office and thinks you're a clown.", "16"
), (
	"energy", "Quickly start snatching all the post-it items.", "You enjoy the recycling.", "You fail to prepare for your next meeting which is in 5 mins and get post-it items all over you.", "16"
);