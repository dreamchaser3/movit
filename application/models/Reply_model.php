<?php



class Reply_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getReplyByPost($post_id)
    {
        $this->db->select('reply.*, user.username, user.id, user.profile_img_url');
        $this->db->join('user', 'user.id = reply.user_id');
        return $this->db->get_where('reply', ['post_id' => $post_id])->result_array();
    }
    public function newReply($content, $post_id, $user_id){
        $this->db->insert('reply', ['content' => $content, 'post_id' => $post_id, 'user_id' => $user_id]);
    }
}
