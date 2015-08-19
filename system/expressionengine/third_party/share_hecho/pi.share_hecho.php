<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Memberlist Class
 *
 * @package     ExpressionEngine
 * @category        Plugin
 * @author      Herman Marin 
 * @copyright       Copyright (c) 2014, Herman Marin
 * @link        http://www.ayuinc.com/
 */

$plugin_info = array(
    'pi_name'         => 'Share Hecho',
    'pi_version'      => '1.0',
    'pi_author'       => 'Herman Marin',
    'pi_author_url'   => 'http://www.ayuinc.com/',
    'pi_description'  => 'Encuentra el id del hecho y genera los share links',
    'pi_usage'        => Share_Hecho::usage()
);
            
class Share_Hecho
{

    var $return_data = "";
    // --------------------------------------------------------------------

        /**
         * Memberlist
         *
         * This function returns a list of members
         *
         * @access  public
         * @return  string
         */
    public function __construct(){
		$this->EE = get_instance();
    }
    
		public function resultado(){
        $resultado = '';
        $idmiembro = ee()->TMPL->fetch_param('id_miembro');
            
				ee()->db->select('entry_id');
        ee()->db->where('author_id', $idmiembro);
        $query = ee()->db->get('exp_freeform_form_entries_2',1);            

        foreach($query->result() as $row)
        {
             $resultado.=$row->entry_id;
        }
        
        return 'http://radiourbe.pe/seguridad-ciudadana/hecho/'.$resultado;
    }

    // --------------------------------------------------------------------

    /**
     * Usage
     *
     * This function describes how the plugin is used.
     *
     * @access  public
     * @return  string
     */
	public static function usage()
	    {
	        ob_start();  ?>
	
	The Memberlist Plugin simply outputs a
	list of 15 members of your site.
	
	    {exp:share_hecho}
	
	This is an incredibly simple Plugin.
	
	
	    <?php
	        $buffer = ob_get_contents();
	        ob_end_clean();
	
	        return $buffer;
	    }
	    // END
	}
	/* End of file pi.share_hecho.php */
	/* Location: ./system/expressionengine/third_party/share_hecho/pi.share_hecho.php */ 