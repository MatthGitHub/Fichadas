/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio;

import java.util.List;
import kronosiii.servicios.DtoUsuariosW;

/**
 *
 * @author Administrador
 */
public class FacadeNegocio {
    private static FacadeNegocio estaClase;
    private kronosController kcont;
    private FacadeNegocio(){
        
    }
    
    public static FacadeNegocio getFacadeNegocio(){
        if(estaClase == null){
            estaClase = new FacadeNegocio();
        }
        return estaClase;
    }
    /********************************* Metodos usuarios *****************************************/
    public DtoUsuariosW traerUsuario(String nombre){
        kcont = kronosController.getKroController();
        return kcont.getUsuario(nombre);
    }
    
    public List<DtoUsuariosW> traerUsuarios(){
        List<DtoUsuariosW> users = kronosController.getKroController().getUsuarios();
        
        return users;
    }
    /********************************* Metodos usuarios *****************************************/
    
}
