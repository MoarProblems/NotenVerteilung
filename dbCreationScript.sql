CREATE DATABASE NotenDB;
USE NotenDB;

--Semester 1
CREATE TABLE GET (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE GP (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE InfI (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE MatI (grade float CHECK (grade BETWEEN 1 AND 6));

--Semester 2
CREATE TABLE MatII (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE GETII (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE InfII (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE Phys (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE Digi (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE EMI (grade float CHECK (grade BETWEEN 1 AND 6));

--Semester 3
CREATE TABLE MatIII (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE GETIII (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE SYS (grade float CHECK (grade BETWEEN 1 AND 6));

CREATE TABLE EBUS (grade float CHECK (grade BETWEEN 1 AND 6));
