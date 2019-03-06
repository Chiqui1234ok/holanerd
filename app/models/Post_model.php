<?php
class Post_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

public function getComments($table, $post) {
    $postSlug = array(
        'slug' => $post
    );
    return DB_GET($table, $postSlug);
}

public function addComment($info) {
    if( V_FORM_ASSOC($info) ) { // Si todos los campos están llenos
        $commentTable = 'comments_'.$info['forum'];
        $postTable = 'posts_'.$info['forum'];

        $this->db->insert($commentTable, $info); // Agrego el comentario a 'comments_'
        return true;
    } else{return false;}
}

public function updateCommentCounter($info) {
    $postTable = 'posts_'.$info['forum']; // Para saber en que tabla updatear el registro
    $this->db->select('comments');                      /* ACÁ LO QUE HAGO ES */
    $aux1 = array('slug' => $info['post']);             /* SELECCIONAR EL POST */
    $query = $this->db->get_where($postTable, $aux1);   /* PARA, DESPUÉS EN CASO */
    $result = $query->result_array();                   /* DE EXISTIR, HAGO +1 A */
                                                        /* SU CONTADOR DE COMMENT */

    if( isset($result[0]['comments']) ){ // Si se encontró el post
        $aux2 = array('comments' => $result[0]['comments']+1);
        $where = array('slug' => $info['post']); // cambié esta linea
        DB_UPDATE($postTable, $aux2, $where); // Le agrego +1 al contador de comentarios de dicho post
        return true; // Por si se necesita acceder a la cantidad de comentarios del post
    } else {
        return false;
    }
}

/*  LO QUE VIENE A PARTIR DE ACÁ ES VIEJO, A REVISAR! */
function getUserToDonate($dbData) {
    // Obtiene el usuario a donar puntos a partir del slug del post
    $this->db->where('slug', $dbData['slug']);
    $this->db->select('author');
    $query = $this->db->get('users');
    $result = $query->result_array();
    return $result[0]['author'];
}

function getClientPoints($dbData) {
    $this->db->where('username', $dbData['username']);
    $this->db->select('points');
    $query = $this->db->get('users');
    $result = $query->result_array();
    return $result[0]['points'];
}

function donatePoints($dbData) { // Main() para donar puntos a un post :D Las fx de arriba son auxiliares
    // $dbData = array($slug, $username, $pointsToDonate);
    $userToDonate = $this->getUserToDonate($dbData);
    $clientPoints = $this->getClientPoints($dbData); // Los puntos del usuario que desea donar
    if( $clientPoints >= $dbData['pointsToDonate'] ) {
        // Ejecuto la SQL para donarle puntos a $userToDonate
    } else {
        // Imprimo error
    }
}

} // Cierre clase