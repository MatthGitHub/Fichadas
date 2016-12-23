/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "TIPODEFRANCO")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Tipodefranco.findAll", query = "SELECT t FROM Tipodefranco t"),
    @NamedQuery(name = "Tipodefranco.findByIdTipoFranco", query = "SELECT t FROM Tipodefranco t WHERE t.idTipoFranco = :idTipoFranco"),
    @NamedQuery(name = "Tipodefranco.findByDescripcion", query = "SELECT t FROM Tipodefranco t WHERE t.descripcion = :descripcion"),
    @NamedQuery(name = "Tipodefranco.findByResolucion", query = "SELECT t FROM Tipodefranco t WHERE t.resolucion = :resolucion"),
    @NamedQuery(name = "Tipodefranco.findByHora", query = "SELECT t FROM Tipodefranco t WHERE t.hora = :hora"),
    @NamedQuery(name = "Tipodefranco.findByDia", query = "SELECT t FROM Tipodefranco t WHERE t.dia = :dia")})
public class Tipodefranco implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdTipoFranco")
    private Integer idTipoFranco;
    @Column(name = "Descripcion")
    private String descripcion;
    @Column(name = "Resolucion")
    private String resolucion;
    @Column(name = "Hora")
    private String hora;
    @Column(name = "Dia")
    private String dia;
    @OneToMany(mappedBy = "idTipoFranco")
    private List<Empleados> empleadosList;

    public Tipodefranco() {
    }

    public Tipodefranco(Integer idTipoFranco) {
        this.idTipoFranco = idTipoFranco;
    }

    public Integer getIdTipoFranco() {
        return idTipoFranco;
    }

    public void setIdTipoFranco(Integer idTipoFranco) {
        this.idTipoFranco = idTipoFranco;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getResolucion() {
        return resolucion;
    }

    public void setResolucion(String resolucion) {
        this.resolucion = resolucion;
    }

    public String getHora() {
        return hora;
    }

    public void setHora(String hora) {
        this.hora = hora;
    }

    public String getDia() {
        return dia;
    }

    public void setDia(String dia) {
        this.dia = dia;
    }

    @XmlTransient
    public List<Empleados> getEmpleadosList() {
        return empleadosList;
    }

    public void setEmpleadosList(List<Empleados> empleadosList) {
        this.empleadosList = empleadosList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idTipoFranco != null ? idTipoFranco.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Tipodefranco)) {
            return false;
        }
        Tipodefranco other = (Tipodefranco) object;
        if ((this.idTipoFranco == null && other.idTipoFranco != null) || (this.idTipoFranco != null && !this.idTipoFranco.equals(other.idTipoFranco))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Tipodefranco[ idTipoFranco=" + idTipoFranco + " ]";
    }
    
}
