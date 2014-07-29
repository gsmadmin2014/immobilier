INSERT INTO `immo_file` (`immo_file_type`, `immo_file_relative_path`, `immo_file_name`, `immo_file_size`, `immo_im_cree`) VALUES
('image/jpeg', '/files/users/default/no-picture.jpg', 'no-picture.jpg', 17165, NULL);


INSERT INTO `immo_image` (`file_id`, `immo_im_dimension`, `immo_im_name`) VALUES
(1, 'xs', 'no-picture.jpg_w60_cx0_cy0_cw598_ch598.jpg'),
(1, 'sm', 'no-picture.jpg_w100_cx0_cy0_cw598_ch598.jpg'),
(1, 'md', 'no-picture.jpg_w140_cx0_cy0_cw598_ch598.jpg');

INSERT INTO `immo_contrat` (`immo_contrat_id`, `immo_contrat_libelle`) VALUES
(1, 'Rent'),
(2, 'Sale');


INSERT INTO `immo_type` (`immo_type_id`, `immo_type_libelle`) VALUES
(1, 'Appartement'),
(2, 'Condo'),
(3, 'Villa');

INSERT INTO `immo_ro_role` (`immo_ro_id`, `immo_ro_parent`, `immo_ro_libelle`) VALUES
(1, NULL, 'guest'),
(2, 1, 'user'),
(3, 2, 'agent'),
(4, 3, 'admin');
