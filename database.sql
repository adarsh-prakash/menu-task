create databse shrcom;

	use shrcom

	create table emp(

		id int(11) auto_increment primary key,

		name varchar(30) not null,

		);

	create table emp(

		sub_id int(11) auto_increment primary key,

		main_menu_id int(11) not null,

		name varchar(50) not null


		);
