drop table workout_cardio;
drop table workout_equipment;
drop table Plan_workout;
drop table Plan_nutrition;
drop table Plan_target;
drop table Cardio;
drop table Equipments;
drop table Workouts;
drop table Nutritions;
drop table Targets;
drop table Member_plan;
drop table Plans;
drop table Logs;
drop table Members;
drop sequence Logs_increment11;

CREATE TABLE Members
(
  email VARCHAR(30) NOT NULL,
  passward VARCHAR(20) NOT NULL,
  name VARCHAR(20) NOT NULL,
  age INT NOT NULL,
  cnic INT NOT NULL,
  gender VARCHAR(6) NOT NULL,
  adress VARCHAR(30) NOT NULL,
  PRIMARY KEY (email),
  UNIQUE (cnic)
);

CREATE TABLE Logs
(
  log_id INT NOT NULL primary key,
  gain INT NOT NULL,
  loss INT NOT NULL,
  BMI INT NOT NULL,
  log_date DATE NOT NULL,
  duration VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL,
  FOREIGN KEY (email) REFERENCES Members(email)
);

Create Sequence Logs_increment11
Start With 1
NOCACHE
NOCYCLE;

CREATE OR Replace Trigger logs_trigg
Before Insert
ON Logs
Referencing NEW AS NEW
For EACH ROW
Begin 
SELECT Logs_increment11.nextval INTO :NEW.log_id FROM dual;
END;
/


CREATE TABLE Plans
(
  plan_id INT NOT NULL,
  type VARCHAR(15) NOT NULL,
 description VARCHAR(50) NOT NULL,  
 duration VARCHAR(20) NOT NULL,
  PRIMARY KEY (plan_id)
);

CREATE TABLE Member_plan
(
  email VARCHAR(30) NOT NULL,
  plan_id INT NOT NULL,
  FOREIGN KEY (email) REFERENCES Members(email),
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  CONSTRAINT MP PRIMARY KEY(email,plan_id)
);

CREATE TABLE Targets
(
  target_id INT NOT NULL,
  description VARCHAR(50) NOT NULL,
  plan_id INT NOT NULL,
  week_no VARCHAR(15) NOT NULL,
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  PRIMARY KEY (target_id)
);

CREATE TABLE Nutritions
(
  nut_id INT NOT NULL,
  description VARCHAR(50) NOT NULL,
  plan_id INT NOT NULL,
  week_no VARCHAR(15) NOT NULL,
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  PRIMARY KEY (nut_id)
);

CREATE TABLE Workouts
(
  work_id INT NOT NULL,
  name varchar(20) NOT NULL,
  targetmucle varchar(20) NOT NULL,
  plan_id INT NOT NULL,
  sets INT NOT NULL,
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  PRIMARY KEY (work_id)
);

CREATE TABLE Equipments
(
  equip_id INT NOT NULL,
  ename varchar(20) NOT NULL,
  work_id INT NOT NULL,
  FOREIGN KEY (work_id) REFERENCES Workouts(work_id),
  PRIMARY KEY (equip_id)
);

CREATE TABLE Cardio
(
  cardio_id INT NOT NULL,
  cname varchar(20) NOT NULL,
  work_id INT NOT NULL,
  FOREIGN KEY (work_id) REFERENCES Workouts(work_id),
  PRIMARY KEY (cardio_id)
);

CREATE TABLE Plan_target
(
  plan_id INT NOT NULL,
  target_id INT NOT NULL,
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  FOREIGN KEY (target_id) REFERENCES Targets(target_id),
  CONSTRAINT PT PRIMARY KEY(plan_id,target_id)
);

CREATE TABLE Plan_nutrition
(
  plan_id INT NOT NULL,
  nut_id INT NOT NULL,
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  FOREIGN KEY (nut_id) REFERENCES Nutritions(nut_id),
  CONSTRAINT PN PRIMARY KEY(plan_id,nut_id)
);

CREATE TABLE Plan_workout
(
  plan_id INT NOT NULL,
  work_id INT NOT NULL,
  FOREIGN KEY (plan_id) REFERENCES Plans(plan_id),
  FOREIGN KEY (work_id) REFERENCES Workouts(work_id),
  CONSTRAINT PW PRIMARY KEY(plan_id,work_id)
);

CREATE TABLE workout_equipment
(
  work_id INT NOT NULL,
  equip_id INT NOT NULL,
  FOREIGN KEY (work_id) REFERENCES Workouts(work_id),
  FOREIGN KEY (equip_id) REFERENCES Equipments(equip_id),
  CONSTRAINT WE PRIMARY KEY(work_id,equip_id)
);

CREATE TABLE workout_cardio
(
  work_id INT NOT NULL,
  cardio_id INT NOT NULL,
  FOREIGN KEY (work_id) REFERENCES Workouts(work_id),
  FOREIGN KEY (cardio_id) REFERENCES Cardio(cardio_id),
  CONSTRAINT WC PRIMARY KEY(work_id,cardio_id)
);


insert into Plans Values(1,'gain',' Bicep,tricep,forearms Gain','2 weeks');
insert into Plans Values(2,'gain','Build back and shoulder and abs','2 weeks');
insert into Plans Values(3,'gain','Improve chest,legs and core','2 weeks');
insert into Plans Values(4,'loss','Natural ways to lose weight','2 weeks');
insert into Plans Values(5,'loss',' Extreme weight loss','3 weeks');
insert into Plans Values(6,'loss','Burn Max Calories(Intense Loss)','1 weeks');




insert into Targets Values(1,'2 days bicep/tricep,1 day rest,3 days forearms',1,'week 1');
insert into Targets Values(2,'2 bicep, 2 days tricep, 2 days forearms	',1,'week 2');
insert into Targets Values(3,'3 days back/ 3 days shoulder',2,'week 1');
insert into Targets Values(4,'3 days abs burn, 2 days back,1 day shouder',2,'week 2');
insert into Targets Values(5,'1 days chest,1 days leg,1 day core (repeat);',3,'week 1');
insert into Targets Values(6,'1 days chest,1 days leg,1 day core (repeat);',3,'week 2');
insert into Targets Values(7,'2 days jogging,2 days running,2 days walk',4,'week 1');
insert into Targets Values(8,'2 days walk,2 days running,2 days walk',4,'week 2');
insert into Targets Values(9,'3 days cycling, 3 days weight trainig',5,'week 1');
insert into Targets Values(10,'3 days swimming, 3 days biking',5,'week 2');
insert into Targets Values(11,'3 days cycling, 3 days yoga',5,'week 3');
insert into Targets Values(12,'3 days stationary bicyle and 3 days running',6,'week 1');


insert into Plan_target Values(1,1);
insert into Plan_target Values(1,2);
insert into Plan_target Values(2,3);
insert into Plan_target Values(2,4);
insert into Plan_target Values(3,5);
insert into Plan_target Values(3,6);
insert into Plan_target Values(4,7);
insert into Plan_target Values(4,8);
insert into Plan_target Values(5,9);
insert into Plan_target Values(5,10);
insert into Plan_target Values(5,11);
insert into Plan_target Values(6,12);


insert into Nutritions Values(1,'broccoli beef, oats, eggs,patato',1,'week 1');
insert into Nutritions Values(2,'fish,chiken,omlet',1,'week 2');
insert into Nutritions Values(3,'chicken fry, fried eggs, grilled corn',2,'week 1');
insert into Nutritions Values(4,'Chicken skillet,vegetable roll,oats',2,'week 2');
insert into Nutritions Values(5,'BBQ chiken, bean salat, patatoes',3,'week 1');
insert into Nutritions Values(6,'Pasta, Toast, Fish',3,'week 2');
insert into Nutritions Values(7,'Smoothie, herbal tea, salad',4,'week 1');
insert into Nutritions Values(8,'Kabab, fruit oat,chicken breast',4,'week 2');
insert into Nutritions Values(9,'Chili fajita, egg toast, corn',5,'week 1');
insert into Nutritions Values(10,'shrimp pasta, spinnich omlate, BBQ',5,'week 2');
insert into Nutritions Values(11,'Chiken,baroccali, selmon',5,'week 3');
insert into Nutritions Values(12,'veggy rolls, smoothie, boiled rice',6,'week 1');

insert into Plan_nutrition Values(1,1);
insert into Plan_nutrition Values(1,2);
insert into Plan_nutrition Values(2,3);
insert into Plan_nutrition Values(2,4);
insert into Plan_nutrition Values(3,5);
insert into Plan_nutrition Values(3,6);
insert into Plan_nutrition Values(4,7);
insert into Plan_nutrition Values(4,8);
insert into Plan_nutrition Values(5,9);
insert into Plan_nutrition Values(5,10);
insert into Plan_nutrition Values(5,11);
insert into Plan_nutrition Values(6,12);


insert into Workouts Values(1,'Barbell Curl','Bicep',1,3);
insert into Workouts Values(2,'Preacher','Bicep',1,3);
insert into Workouts Values(3,'Close grip bar','Tricep',1,3);
insert into Workouts Values(4,'Hip Thrust','Legs',3,2);
insert into Workouts Values(5,'Squats','Legs',4,2);
insert into Workouts Values(6,'deadlift','Legs',5,2);
insert into Workouts Values(7,'Leg curl','Legs',6,4);
insert into Workouts Values(8,'Butterfly','Back',1,4);
insert into Workouts Values(9,'Benchpress','Chest',3,3);
insert into Workouts Values(10,'Twister','Abs',2,5);
insert into Workouts Values(11,'Cycling','Tummy',4,6);
insert into Workouts Values(12,'Swimming','Tummy',5,5);
insert into Workouts Values(13,'Running','Tummy',6,4);
insert into Workouts Values(14,'Hammer Curl','Forearm',1,3);

insert into Plan_workout Values(1,1);
insert into Plan_workout Values(1,2);
insert into Plan_workout Values(1,3);
insert into Plan_workout Values(3,4);
insert into Plan_workout Values(4,5);
insert into Plan_workout Values(5,6);
insert into Plan_workout Values(6,7);
insert into Plan_workout Values(1,8);
insert into Plan_workout Values(3,9);
insert into Plan_workout Values(2,10);
insert into Plan_workout Values(4,11);
insert into Plan_workout Values(5,12);
insert into Plan_workout Values(6,13);
insert into Plan_workout Values(1,14);

insert into Equipments Values(1,'Dumbels',1);
insert into Equipments Values(2,'Rod',2);
insert into Equipments Values(3,'Rope',14);
insert into Equipments Values(4,'Rod',3);
insert into Equipments Values(5,'Weights',4);
insert into Equipments Values(6,'Rod',6);
insert into Equipments Values(7,'Dumbels',7);
insert into Equipments Values(8,'Machine',8);
insert into Equipments Values(9,'Rod',9);


insert into workout_equipment Values(1,1);
insert into workout_equipment Values(2,2);
insert into workout_equipment Values(14,3);
insert into workout_equipment Values(3,4);
insert into workout_equipment Values(4,5);
insert into workout_equipment Values(6,6);
insert into workout_equipment Values(7,7);
insert into workout_equipment Values(8,8);
insert into workout_equipment Values(9,9);


insert into Cardio Values(1,'Treadmill',13);
insert into Cardio Values(2,'Standing Cycle',11);
insert into Cardio Values(3,'Swimming Pool',12);
insert into Cardio Values(4,'Squats',5);
insert into Cardio Values(5,'Twister Machine',10);

insert into workout_cardio Values(13,1);
insert into workout_cardio Values(11,2);
insert into workout_cardio Values(12,3);
insert into workout_cardio Values(5,4);
insert into workout_cardio Values(10,5);

COMMIT;

