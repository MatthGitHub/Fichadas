/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import kronosiii.negocio.entidades.UsuariosWeb;
import kronosiii.negocio.entidades.controladores.UsuariosWebJpaController;
import kronosiii.servicios.DtoUsuariosW;

/**
 *
 * @author Administrador
 */
public class kronosController {
    private static kronosController estaClase;
    private UsuariosWebJpaController serviciosU;
    private EntityManagerFactory emf;
    private EntityManager em;
    private DtoUsuariosW dto;
    
    private kronosController(){
        emf = Persistence.createEntityManagerFactory("KronosIIIPU");
        dto = new DtoUsuariosW();
    }
    
    public static kronosController getKroController(){
        if(estaClase == null){
            estaClase = new kronosController();
        }
        return estaClase;
    }
    
    /********************************* Metodos usuarios *****************************************/
    public DtoUsuariosW getUsuario(String nombre){
       return dto.cargarDto(serviciosU.findUsuariosWeb(nombre));
    }
    
    public List<DtoUsuariosW> getUsuarios(){
        serviciosU = new UsuariosWebJpaController(emf);
        List<DtoUsuariosW> dtousuarios = new ArrayList<>();
        List<UsuariosWeb> usuarios = serviciosU.findUsuariosWebEntities();
        Iterator<UsuariosWeb> iterador = usuarios.iterator();
        while(iterador.hasNext()){
            DtoUsuariosW elDto;
            elDto = dto.cargarDto(iterador.next());
            dtousuarios.add(elDto);
        }
        return dtousuarios;
    }
    /********************************* Metodos usuarios *****************************************/
}
