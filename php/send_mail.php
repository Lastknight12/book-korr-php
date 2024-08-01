<?php

//$to = 'uplink72@gmail.com';
$to = 'book.korr@mail.ru';

parse_str( $_POST[ 'form_data' ], $form_data );

$message = '
Имя: ' . htmlentities( strip_tags( $form_data[ 'name' ] ) ) . '
Email: ' . htmlentities( strip_tags( $form_data[ 'email' ] ) ) . '
Сообщение: ' . htmlentities( strip_tags( $form_data[ 'message' ] ) ) . '
Форма: ' . htmlentities( strip_tags( $form_data[ 'type' ] ) ) . '
';

mail( $to, 'Сообщение с Book-korr.ru', $message );

echo json_encode( [ 'error' => false ] );
	
die();