-- -----------------------------------------------------
-- Insert some data inside our tables (DB : office_warriors)
-- -----------------------------------------------------
<<<<<<< HEAD
USE office_warriors;
=======

>>>>>>> origin/dev
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

INSERT INTO event (
    name,
    image,
    description,
    strength,
    energy,
    humor,
    agility,
    floor_restriction
  ) VALUES (
    "Event 0",
    "https://via.placeholder.com/150",
    "blablablabla",
    "0",
    "0",
    "0",
    "0",
    "1" 
  ), (
    "Event 1 hard NRJ",
    "https://via.placeholder.com/150",
    "blablablabla",
    "2",
    "10",
    "0",
    "1",
    "1"  
  ), (
    "Event 2",
    "https://via.placeholder.com/150",
    "blablablabla",
    "2",
    "2",
    "2",
    "2",
    "1"  
  ), (
    "Event 3",
    "https://via.placeholder.com/150",
    "blablablabla",
    "2",
    "3",
    "4",
    "5",
    "2"  
  ), (
    "Event 4 EZ",
    "https://via.placeholder.com/150",
    "blablablabla",
    "0",
    "0",
    "0",
    "0",
    "2"  
  ), (
    "Event 5 EZ NRJ",
    "https://via.placeholder.com/150",
    "blablablabla",
    "10",
    "0",
    "10",
    "10",
    "2"  
  );
