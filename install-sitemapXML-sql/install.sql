SET @configuration_group_id=0;
SELECT (@configuration_group_id:=configuration_group_id) FROM configuration_group WHERE configuration_group_title= 'Sitemap XML' LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;
DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;

INSERT INTO configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (NULL, 'Sitemap XML', 'Sitemap XML Configuration', '1', '1');
SET @configuration_group_id=last_insert_id();
UPDATE configuration_group SET sort_order = @configuration_group_id WHERE configuration_group_id = @configuration_group_id;

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Compress XML File', 'SITEMAPXML_COMPRESS', 'false', 'Compress Google XML Sitemap file', @configuration_group_id, 1, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Lastmod tag format', 'SITEMAPXML_LASTMOD_FORMAT', 'date', 'Lastmod tag format:<br />date - Complete date: YYYY-MM-DD (eg 1997-07-16)<br />full -    Complete date plus hours, minutes and seconds: YYYY-MM-DDThh:mm:ssTZD (eg 1997-07-16T19:20:30+01:00)', @configuration_group_id, 2, NOW(), NULL, 'zen_cfg_select_option(array(\'date\', \'full\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Use Existing Files', 'SITEMAPXML_USE_EXISTING_FILES', 'true', 'Use Existing XML Files', @configuration_group_id, 3, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Generate language_id for default language', 'SITEMAPXML_USE_DEFAULT_LANGUAGE', 'true', 'Generate language_id parameter for default language', @configuration_group_id, 4, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Ping urls', 'SITEMAPXML_PING_URLS', 'Google => http://www.google.com/webmasters/sitemaps/ping?sitemap=%s; Yahoo! => http://search.yahooapis.com/SiteExplorerService/V1/ping?sitemap=%s; Ask.com => http://submissions.ask.com/ping?sitemap=%s; Microsoft => http://www.moreover.com/ping?u=%s', 'List of pinging urls separated by ;', @configuration_group_id, 10, NOW(), NULL, 'zen_cfg_textarea(');

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Products order by', 'SITEMAPXML_PRODUCTS_ORDERBY', 'products_sort_order ASC, last_date DESC', '', @configuration_group_id, 20, NOW(), NULL, NULL);
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Products changefreq', 'SITEMAPXML_PRODUCTS_CHANGEFREQ', 'weekly', 'How frequently the Product pages page is likely to change.', @configuration_group_id, 21, NOW(), NULL, 'zen_cfg_select_option(array(\'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Categories order by', 'SITEMAPXML_CATEGORIES_ORDERBY', 'sort_order ASC, last_date DESC', '', @configuration_group_id, 30, NOW(), NULL, NULL);
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Category changefreq', 'SITEMAPXML_CATEGORIES_CHANGEFREQ', 'weekly', 'How frequently the Category pages page is likely to change.', @configuration_group_id, 31, NOW(), NULL, 'zen_cfg_select_option(array(\'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Reviews order by', 'SITEMAPXML_REVIEWS_ORDERBY', 'reviews_rating ASC, last_date DESC', '', @configuration_group_id, 40, NOW(), NULL, NULL);
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Reviews changefreq', 'SITEMAPXML_REVIEWS_CHANGEFREQ', 'weekly', 'How frequently the Category pages page is likely to change.', @configuration_group_id, 41, NOW(), NULL, 'zen_cfg_select_option(array(\'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'EZPages order by', 'SITEMAPXML_EZPAGES_ORDERBY', 'sidebox_sort_order ASC, header_sort_order ASC, footer_sort_order ASC', '', @configuration_group_id, 50, NOW(), NULL, NULL);
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'EZPages changefreq', 'SITEMAPXML_EZPAGES_CHANGEFREQ', 'weekly', 'How frequently the EZPages pages page is likely to change.', @configuration_group_id, 51, NOW(), NULL, 'zen_cfg_select_option(array(\'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),');
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Testimonials order by', 'SITEMAPXML_TESTIMONIALS_ORDERBY', 'last_date DESC', '', @configuration_group_id, 60, NOW(), NULL, NULL);
INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Testimonials changefreq', 'SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'weekly', 'How frequently the EZPages pages page is likely to change.', @configuration_group_id, 61, NOW(), NULL, 'zen_cfg_select_option(array(\'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),');