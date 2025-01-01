
CREATE TABLE admin_info (
  id int(11) NOT NULL,
  emp_id int(11) NOT NULL,
  name varchar(30) NOT NULL,
  email varchar(30) NOT NULL,
  admin_pass varchar(12) NOT NULL,
  admin_depart varchar(5) NOT NULL
);

INSERT INTO admin_info (id, emp_id, name, email, admin_pass, admin_depart)
VALUES 
    (1, 1001, 'admin', 'admin@gmail.com', 'admin', 'CSE'),
    (2, 1002, 'Md. Rajuan Hossen', 'rajuan.official@gmail.com', 'admin', 'Teacher'),
    (3, 1003, 'Hasebul Hasan', 'hasebul@gmail.com', 'admin', 'admin'),
    (4, 1004, 'Md. Rajuan Hossen', 'rajuan.official@gmail.com', 'teacher', 'Teacher'),
    (5, 1005, 'Humayra', 'humayra@gmail.com', 'teacher', 'Teacher');


CREATE TABLE attendence (
  id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  course_id varchar(10) NOT NULL,
  p_date date NOT NULL,
  attendence enum('Present','Absent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE course_offer (
  id int(11) NOT NULL,
  batch int(11) NOT NULL,
  semester varchar(15) NOT NULL,
  course_id varchar(10) NOT NULL,
  course_name varchar(30) NOT NULL,
  credit float NOT NULL,
  price int(11) NOT NULL,
  schedule varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
DELIMITER $$
CREATE TRIGGER ADD_price BEFORE INSERT ON course_offer FOR EACH ROW BEGIN
IF NEW.credit = 1 THEN
SET NEW.price = 2800;
END IF;
IF NEW.credit = 1.5 THEN
SET NEW.price = 3500;
END IF;
IF NEW.credit = 2 THEN
SET NEW.price = 3000;
END IF;
IF NEW.credit = 2.5 THEN
SET NEW.price = 3500;
END IF;
IF NEW.credit = 3 THEN
SET NEW.price = 4000;
END IF;
IF NEW.credit = 4 THEN
SET NEW.price = 4200;
END IF;
END
$$
DELIMITER ;
CREATE TABLE course_taken (
  id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  semester varchar(15) NOT NULL,
  course_id varchar(10) NOT NULL,
  course_name varchar(50) NOT NULL,
  credit float NOT NULL,
  price int(11) DEFAULT NULL,
  schedule varchar(255) NOT NULL
) ;
CREATE TABLE result (
  id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  course_id varchar(15) NOT NULL,
  batch int(11) NOT NULL,
  section varchar(5) NOT NULL,
  semester varchar(15) NOT NULL,
  marks int(11) NOT NULL,
  grade varchar(5) NOT NULL,
  points float NOT NULL,
  course_name varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE student_info (
  student_id int(11) NOT NULL,
  first_name varchar(15) NOT NULL,
  last_name varchar(10) NOT NULL,
  depart_name varchar(5) NOT NULL,
  batch int(11) NOT NULL,
  section varchar(12) NOT NULL,
  semester varchar(8) NOT NULL,
  email varchar(30) NOT NULL,
  pass varchar(12) NOT NULL,
  dob date NOT NULL,
  nation varchar(15) NOT NULL,
  mobile varchar(14) NOT NULL,
  gender varchar(6) NOT NULL,
  religion varchar(10) NOT NULL,
  blood varchar(3) NOT NULL,
  marit varchar(10) NOT NULL,
  father_n varchar(20) NOT NULL,
  father_pro varchar(10) NOT NULL,
  mother_n varchar(20) NOT NULL,
  mother_pro varchar(10) NOT NULL,
  gurdian_n varchar(20) NOT NULL,
  gurdian_phone varchar(14) NOT NULL,
  present_add varchar(255) NOT NULL,
  parmanent_add varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
ALTER TABLE admin_info
  ADD PRIMARY KEY (id,emp_id,email);
ALTER TABLE attendence
  ADD PRIMARY KEY (id);
ALTER TABLE course_offer
  ADD PRIMARY KEY (id);
ALTER TABLE course_taken
  ADD PRIMARY KEY (id);
ALTER TABLE result
  ADD PRIMARY KEY (id);
ALTER TABLE student_info
  ADD PRIMARY KEY (student_id,mobile,email) USING BTREE;
ALTER TABLE admin_info
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE attendence
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
ALTER TABLE course_offer
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE course_taken
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
ALTER TABLE result
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;