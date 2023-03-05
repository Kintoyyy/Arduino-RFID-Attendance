-- PHP-Auth (https://github.com/delight-im/PHP-Auth)
-- Copyright (c) delight.im (https://www.delight.im/)
-- Licensed under the MIT License (https://opensource.org/licenses/MIT)
PRAGMA foreign_keys = OFF;

CREATE TABLE
	"users" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL CHECK ("id" >= 0),
		"school_id" INTEGER NOT NULL,
		"card_uid" VARCHAR(30) NOT NULL DEFAULT "None",
		"device_uid" VARCHAR(20) NOT NULL DEFAULT "0",
		"device_dep" VARCHAR(20) NOT NULL DEFAULT "0",
		"add_card" INTEGER NOT NULL DEFAULT "0",
		"last_dest" VARCHAR(30) NOT NULL DEFAULT "None",
		"email" VARCHAR(249) NOT NULL,
		"password" VARCHAR(255) NOT NULL,
		"username" VARCHAR(100) DEFAULT NULL,
		"gender" VARCHAR(10) DEFAULT "None",
		"status" INTEGER NOT NULL CHECK ("status" >= 0) DEFAULT "0",
		"verified" INTEGER NOT NULL CHECK ("verified" >= 0) DEFAULT "0",
		"resettable" INTEGER NOT NULL CHECK ("resettable" >= 0) DEFAULT "1",
		"roles_mask" INTEGER NOT NULL CHECK ("roles_mask" >= 0) DEFAULT "0",
		"registered" INTEGER NOT NULL CHECK ("registered" >= 0),
		"last_login" INTEGER CHECK ("last_login" >= 0) DEFAULT NULL,
		"force_logout" INTEGER NOT NULL CHECK ("force_logout" >= 0) DEFAULT "0",
		"created_at" TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
		CONSTRAINT "email" UNIQUE ("email"),
		CONSTRAINT "school_id" UNIQUE ("school_id"),
		CONSTRAINT "card_uid" UNIQUE ("card_uid")
	);

CREATE TABLE
	"student_logs" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL CHECK ("id" >= 0),
		"username" VARCHAR(100) NOT NULL,
		"school_id" INTEGER NOT NULL,
		"card_uid" VARCHAR(30) NOT NULL,
		"device_uid" VARCHAR(20) NOT NULL,
		"device_dep" VARCHAR(20) NOT NULL,
		"checkindate" TEXT NOT NULL,
		"timein" TEXT NOT NULL,
		"timeout" TEXT NOT NULL,
		"card_out" INTEGER NOT NULL DEFAULT "0",
		"last_dest" VARCHAR(30) NOT NULL
	);

CREATE TABLE
	"rfid_device" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL CHECK ("id" >= 0),
		"device_name" VARCHAR(50) NOT NULL,
		"device_dep" VARCHAR(20) NOT NULL,
		"device_room" TEXT NOT NULL,
		"device_uid" TEXT NOT NULL,
		"device_date" TEXT NOT NULL,
		"device_mode" INTEGER NOT NULL DEFAULT "0",
		"device_api_key" VARCHAR(20) NOT NULL,
		CONSTRAINT "device_uid" UNIQUE ("device_uid")
	);

CREATE TABLE
	"users_confirmations" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL CHECK ("id" >= 0),
		"user_id" INTEGER NOT NULL CHECK ("user_id" >= 0),
		"email" VARCHAR(249) NOT NULL,
		"selector" VARCHAR(16) NOT NULL,
		"token" VARCHAR(255) NOT NULL,
		"expires" INTEGER NOT NULL CHECK ("expires" >= 0),
		CONSTRAINT "selector" UNIQUE ("selector")
	);

CREATE INDEX "users_confirmations.email_expires" ON "users_confirmations" ("email", "expires");

CREATE INDEX "users_confirmations.user_id" ON "users_confirmations" ("user_id");

CREATE TABLE
	"users_remembered" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL CHECK ("id" >= 0),
		"user" INTEGER NOT NULL CHECK ("user" >= 0),
		"selector" VARCHAR(24) NOT NULL,
		"token" VARCHAR(255) NOT NULL,
		"expires" INTEGER NOT NULL CHECK ("expires" >= 0),
		CONSTRAINT "selector" UNIQUE ("selector")
	);

CREATE INDEX "users_remembered.user" ON "users_remembered" ("user");

CREATE TABLE
	"users_resets" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL CHECK ("id" >= 0),
		"user" INTEGER NOT NULL CHECK ("user" >= 0),
		"selector" VARCHAR(20) NOT NULL,
		"token" VARCHAR(255) NOT NULL,
		"expires" INTEGER NOT NULL CHECK ("expires" >= 0),
		CONSTRAINT "selector" UNIQUE ("selector")
	);

CREATE INDEX "users_resets.user_expires" ON "users_resets" ("user", "expires");

CREATE TABLE
	"users_throttling" (
		"bucket" VARCHAR(44) PRIMARY KEY NOT NULL,
		"tokens" REAL NOT NULL CHECK ("tokens" >= 0),
		"replenished_at" INTEGER NOT NULL CHECK ("replenished_at" >= 0),
		"expires_at" INTEGER NOT NULL CHECK ("expires_at" >= 0)
	);

CREATE INDEX "users_throttling.expires_at" ON "users_throttling" ("expires_at");

