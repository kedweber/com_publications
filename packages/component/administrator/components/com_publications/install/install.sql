-- Create the english table
CREATE TABLE IF NOT EXISTS `#__publications_publications` (
	`publications_publication_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
	`uuid` char(36) NOT NULL,
	`cck_fieldset_id` int NOT NULL DEFAULT '2100',
	`title` varchar(255) NOT NULL,
	`slug` varchar(255) NOT NULL,
	`publish_up` date NOT NULL,
	`publish_down` date NOT NULL,
	`type` varchar(255) NOT NULL DEFAULT 'publication',
	`fields` text NOT NULL,
	`ordering` int NOT NULL,
	`enabled` tinyint(1) NOT NULL,
	`created_on` datetime NOT NULL,
	`created_by` int NOT NULL,
	`modified_on` datetime NOT NULL,
	`modified_by` int NOT NULL,
	`locked_on` datetime NOT NULL,
	`locked_by` int NOT NULL,
	PRIMARY KEY (`publications_publication_id`)
);

-- Create the french table
CREATE TABLE IF NOT EXISTS `#__fr_publications_publications` (
	`publications_publication_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
	`uuid` char(36) NOT NULL,
	`cck_fieldset_id` int NOT NULL DEFAULT '2100',
	`title` varchar(255) NOT NULL,
	`slug` varchar(255) NOT NULL,
	`publish_up` date NOT NULL,
	`publish_down` date NOT NULL,
	`type` varchar(255) NOT NULL DEFAULT 'publication',
	`fields` text NOT NULL,
	`ordering` int NOT NULL,
	`enabled` tinyint(1) NOT NULL,
	`created_on` datetime NOT NULL,
	`created_by` int NOT NULL,
	`modified_on` datetime NOT NULL,
	`modified_by` int NOT NULL,
	`locked_on` datetime NOT NULL,
	`locked_by` int NOT NULL,
	PRIMARY KEY (`publications_publication_id`)
);

-- Insert the fieldset into the cck_fieldsets table
INSERT INTO `#__cck_fieldsets` (`cck_fieldset_id`, `title`, `slug`, `enabled`) VALUES('2100', 'Publication', 'publication', 1);

-- Add the elements (when known)