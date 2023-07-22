<?php
/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */
interface IMunicipioRepository {
    //put your code here
    
    public function __construct();
    public function selectById($id);
}
