package kronosiii.negocio.entidades;

import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Empleados;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:01")
@StaticMetamodel(Edificio.class)
public class Edificio_ { 

    public static volatile SingularAttribute<Edificio, String> descripcion;
    public static volatile SingularAttribute<Edificio, Integer> idEdificio;
    public static volatile ListAttribute<Edificio, Empleados> empleadosList;

}